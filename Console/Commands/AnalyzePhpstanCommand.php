<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Documentation\AnalyzePhpstanIssuesAction;

class AnalyzePhpstanCommand extends Command
{
    protected $signature = 'xot:phpstan:analyze {module? : Nome del modulo da analizzare}';
    protected $description = 'Analizza uno o tutti i moduli con PHPStan e documenta i risultati';

    public function handle(AnalyzePhpstanIssuesAction $action): int
    {
        $moduleName = $this->argument('module');

        if ($moduleName) {
            if (!File::isDirectory(base_path("Modules/{$moduleName}"))) {
                $this->error("Il modulo {$moduleName} non esiste!");
                return 1;
            }
            
            $action->execute($moduleName);
            $this->info("Analisi PHPStan completata per il modulo {$moduleName}");
            $this->info("Documentazione generata in: Modules/{$moduleName}/docs/phpstan/ANALISI_PHPSTAN.md");
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
        $this->info('Analisi PHPStan completata per tutti i moduli');
        $this->info('Controlla la cartella docs/phpstan di ogni modulo per i risultati');
        
        return 0;
    }
} 