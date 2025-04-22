<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Documentation;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

class UpdateModuleDocumentationAction
{
    use QueueableAction;

    public function execute(string $moduleName): void
    {
        $moduleDocsPath = base_path("Modules/{$moduleName}/docs");
        $rootDocsPath = base_path('docs');

        // Crea la cartella docs se non esiste
        if (!File::isDirectory($moduleDocsPath)) {
            File::makeDirectory($moduleDocsPath, 0755, true);
        }

        // Crea/Aggiorna README.md del modulo
        $this->updateReadme($moduleName, $moduleDocsPath);

        // Aggiorna i collegamenti nel docs principale
        $this->updateMainIndex($moduleName, $rootDocsPath);

        // Crea/Aggiorna la struttura base delle cartelle
        $this->createBaseFolders($moduleDocsPath);
    }

    private function updateReadme(string $moduleName, string $moduleDocsPath): void
    {
        $readmePath = "{$moduleDocsPath}/README.md";
        $content = "# Modulo {$moduleName}\n\n";
        $content .= "## 🎯 Perché questo Modulo?\n\n";
        $content .= "Questo modulo è responsabile di...\n\n";
        $content .= "## 📚 Indice della Documentazione\n\n";
        $content .= "### Architettura\n";
        $content .= "- [[architecture/overview.md|Panoramica Architetturale]]\n";
        $content .= "- [[architecture/decisions.md|Decisioni Architetturali]]\n\n";
        $content .= "### Guide\n";
        $content .= "- [[guides/getting-started.md|Iniziare]]\n";
        $content .= "- [[guides/configuration.md|Configurazione]]\n\n";
        $content .= "### API\n";
        $content .= "- [[api/endpoints.md|Endpoints]]\n";
        $content .= "- [[api/models.md|Modelli]]\n\n";
        $content .= "## 🔄 Collegamenti Utili\n\n";
        $content .= "- [[../../docs/index.md|Documentazione Principale]]\n";
        $content .= "- [[CHANGELOG.md|Changelog]]\n";
        $content .= "- [[CONTRIBUTING.md|Come Contribuire]]\n";

        File::put($readmePath, $content);
    }

    private function updateMainIndex(string $moduleName, string $rootDocsPath): void
    {
        $indexPath = "{$rootDocsPath}/index.md";
        
        if (!File::exists($indexPath)) {
            $this->createMainIndex($rootDocsPath);
        }

        $content = File::get($indexPath);
        $moduleLink = "- [[../Modules/{$moduleName}/docs/README.md|{$moduleName}]]";

        if (!str_contains($content, $moduleLink)) {
            $content = preg_replace(
                '/(## 🔄 Collegamenti ai Moduli\n\n)/',
                "$1{$moduleLink}\n",
                $content
            );
            File::put($indexPath, $content);
        }
    }

    private function createMainIndex(string $rootDocsPath): void
    {
        if (!File::isDirectory($rootDocsPath)) {
            File::makeDirectory($rootDocsPath, 0755, true);
        }

        $content = "# Documentazione Progetto\n\n";
        $content .= "## 🎯 Perché Questo Progetto?\n\n";
        $content .= "Questo progetto implementa...\n\n";
        $content .= "## 📚 Indice della Documentazione\n\n";
        $content .= "### Architettura\n";
        $content .= "- [[architettura/principi.md|Principi Architetturali]]\n";
        $content .= "- [[architettura/moduli.md|Sistema Modulare]]\n\n";
        $content .= "## 🔄 Collegamenti ai Moduli\n\n";

        File::put("{$rootDocsPath}/index.md", $content);
    }

    private function createBaseFolders(string $moduleDocsPath): void
    {
        $folders = [
            'architecture',
            'guides',
            'api',
            'examples',
            'tests'
        ];

        foreach ($folders as $folder) {
            $path = "{$moduleDocsPath}/{$folder}";
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0755, true);
                File::put(
                    "{$path}/README.md",
                    "# {$folder}\n\nQuesta cartella contiene la documentazione relativa a {$folder}.\n"
                );
            }
        }
    }
} 