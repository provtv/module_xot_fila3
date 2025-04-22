<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Documentation\UpdateModuleDocumentationAction;

class UpdateModuleDocsCommand extends Command
{
    protected $signature = 'xot:docs:update {module? : Nome del modulo da aggiornare}';
    protected $description = 'Aggiorna la documentazione di uno o tutti i moduli';

    public function handle(UpdateModuleDocumentationAction $action): int
    {
        $moduleName = $this->argument('module');

        if ($moduleName) {
            if (!File::isDirectory(base_path("Modules/{$moduleName}"))) {
                $this->error("Il modulo {$moduleName} non esiste!");
                return 1;
            }
            
            $action->execute($moduleName);
            $this->info("Documentazione aggiornata per il modulo {$moduleName}");
            return 0;
        }

        $modules = collect(File::directories(base_path('Modules')))
            ->map(fn($path) => basename($path))
            ->filter(fn($dir) => $dir !== 'docs' && $dir !== 'resources' && $dir !== 'views');

        $bar = $this->output->createProgressBar(count($modules));
        $bar->start();

        foreach ($modules as $module) {
            $action->execute($module);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Documentazione aggiornata per tutti i moduli');
        
        return 0;
    }
} 