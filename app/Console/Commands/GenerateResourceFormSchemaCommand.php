<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Modules\Xot\Services\FileService;
use Webmozart\Assert\Assert;

/**
 * Comando per generare automaticamente lo schema del form per le risorse Filament.
 */
class GenerateResourceFormSchemaCommand extends Command
{
    /**
     * Il nome e la firma del comando.
     *
     * @var string
     */
    protected $signature = 'xot:generate-resource-form-schema {resource} {--model=} {--module=}';

    /**
     * La descrizione del comando.
     *
     * @var string
     */
    protected $description = 'Genera automaticamente lo schema del form per una risorsa Filament basato sul modello associato';

    /**
     * Esegue il comando.
     */
    public function handle(): int
    {
        $resourceName = $this->argument('resource');
        $module = $this->option('module');
        $modelName = $this->option('model') ?: Str::singular($resourceName);

        Assert::string($resourceName, 'Il nome della risorsa deve essere una stringa');
        Assert::string($modelName, 'Il nome del modello deve essere una stringa');
        
        $this->info("Generazione schema form per la risorsa [{$resourceName}] basato sul modello [{$modelName}]");

        $pattern = $module
            ? base_path("Modules/{$module}/app/Filament/Resources/*Resource.php")
            : base_path('app/Filament/Resources/*Resource.php');

        $resourceFiles = glob($pattern);
        Assert::isArray($resourceFiles);

        foreach ($resourceFiles as $file) {
            if ($resourceName && ! str_contains($file, $resourceName)) {
                continue;
            }

            $content = file_get_contents($file);
            Assert::string($content);

            if (! $this->needsFormSchema($content)) {
                $this->info("Schema form già esistente per il file: {$file}");
                continue;
            }

            $this->generateFormSchema($file, $content, $modelName);
            $this->info("Schema form generato per: {$file}");
        }

        return Command::SUCCESS;
    }

    /**
     * Verifica se la risorsa necessita di uno schema form.
     */
    private function needsFormSchema(string $content): bool
    {
        return ! str_contains($content, 'public static function form(Form $form)');
    }

    /**
     * Genera lo schema del form per una risorsa.
     */
    private function generateFormSchema(string $file, string $content, string $modelName): void
    {
        $schemaMethod = $this->getFormSchemaTemplate($modelName);

        $modifiedContent = preg_replace(
            '/}(\s*)$/',
            $schemaMethod . '}$1',
            $content
        );

        Assert::string($modifiedContent);
        file_put_contents($file, $modifiedContent);
    }

    /**
     * Ottiene il template dello schema form.
     */
    private function getFormSchemaTemplate(string $modelName): string
    {
        $variableName = Str::camel($modelName);

        return <<<PHP

    /**
     * Definisce il form della risorsa.
     */
    public static function form(Form \$form): Form
    {
        return \$form
            ->schema([
                Forms\Components\TextInput::make('{$variableName}_name')
                    ->label(trans('{$variableName}.fields.name'))
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\Textarea::make('{$variableName}_description')
                    ->label(trans('{$variableName}.fields.description'))
                    ->maxLength(65535),
                    
                Forms\Components\Toggle::make('is_active')
                    ->label(trans('common.fields.is_active'))
                    ->default(true),
                    
                Forms\Components\DateTimePicker::make('published_at')
                    ->label(trans('common.fields.published_at')),
            ]);
    }
PHP;
    }
}
