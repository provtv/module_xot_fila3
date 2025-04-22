<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Documentation;

use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\Process\Process;

class AnalyzePhpstanIssuesAction
{
    use QueueableAction;

    public function execute(string $moduleName): void
    {
        $moduleDocsPath = base_path("Modules/{$moduleName}/docs/phpstan");
        $modulePath = base_path("Modules/{$moduleName}");

        // Crea la cartella docs/phpstan se non esiste
        if (!File::isDirectory($moduleDocsPath)) {
            File::makeDirectory($moduleDocsPath, 0755, true);
        }

        // Esegui PHPStan sul modulo specifico
        $process = new Process([
            './vendor/bin/phpstan',
            'analyse',
            $modulePath,
            '--level=max',
            '--memory-limit=2G',
            '--error-format=json'
        ]);
        
        $process->run();
        $output = json_decode($process->getOutput(), true);

        if (!isset($output['files']) || empty($output['files'])) {
            $this->documentNoIssues($moduleDocsPath, $moduleName);
            return;
        }

        $this->documentIssues($moduleDocsPath, $output, $moduleName);
    }

    private function documentIssues(string $moduleDocsPath, array $output, string $moduleName): void
    {
        $date = date('Y-m-d');
        $content = "# Analisi PHPStan del Modulo {$moduleName}\n\n";
        $content .= "Data analisi: {$date}\n\n";
        $content .= "## Problemi Rilevati\n\n";

        $issuesByType = [];
        $totalIssues = 0;

        foreach ($output['files'] as $file => $fileInfo) {
            foreach ($fileInfo['messages'] as $message) {
                $type = $this->categorizeIssue($message['message']);
                $issuesByType[$type][] = [
                    'file' => $file,
                    'line' => $message['line'],
                    'message' => $message['message']
                ];
                $totalIssues++;
            }
        }

        $content .= "### Riepilogo\n\n";
        $content .= "Totale problemi rilevati: {$totalIssues}\n\n";

        foreach ($issuesByType as $type => $issues) {
            $content .= "### {$type} (" . count($issues) . " problemi)\n\n";
            foreach ($issues as $issue) {
                $relativePath = str_replace(base_path() . '/', '', $issue['file']);
                $content .= "- File: `{$relativePath}`\n";
                $content .= "  - Linea: {$issue['line']}\n";
                $content .= "  - Problema: {$issue['message']}\n";
                $content .= "  - Possibile soluzione: " . $this->suggestSolution($issue['message']) . "\n\n";
            }
        }

        $content .= "\n## Piano di Risoluzione\n\n";
        $content .= "1. Prioritizzare la risoluzione dei problemi di tipo error e critici\n";
        $content .= "2. Affrontare i problemi di tipizzazione mancante\n";
        $content .= "3. Risolvere i problemi di metodi/proprietà non esistenti\n";
        $content .= "4. Implementare i test mancanti\n";
        $content .= "5. Documentare le eccezioni e i casi edge\n";

        File::put("{$moduleDocsPath}/ANALISI_PHPSTAN.md", $content);
    }

    private function documentNoIssues(string $moduleDocsPath, string $moduleName): void
    {
        $date = date('Y-m-d');
        $content = "# Analisi PHPStan del Modulo {$moduleName}\n\n";
        $content .= "Data analisi: {$date}\n\n";
        $content .= "## Risultato\n\n";
        $content .= "✅ Nessun problema rilevato dall'analisi PHPStan.\n\n";
        $content .= "### Nota\n\n";
        $content .= "Anche se non sono stati rilevati problemi, è importante:\n\n";
        $content .= "1. Mantenere il codice aggiornato\n";
        $content .= "2. Aggiungere test dove mancanti\n";
        $content .= "3. Documentare le parti complesse\n";
        $content .= "4. Seguire le best practices del progetto\n";

        File::put("{$moduleDocsPath}/ANALISI_PHPSTAN.md", $content);
    }

    private function categorizeIssue(string $message): string
    {
        if (str_contains($message, 'undefined method') || str_contains($message, 'undefined property')) {
            return 'Metodi e Proprietà Non Definiti';
        }
        if (str_contains($message, 'type') || str_contains($message, 'typehint')) {
            return 'Problemi di Tipizzazione';
        }
        if (str_contains($message, 'test')) {
            return 'Test Mancanti o Incompleti';
        }
        if (str_contains($message, 'parameter') || str_contains($message, 'argument')) {
            return 'Parametri e Argomenti';
        }
        if (str_contains($message, 'return')) {
            return 'Tipi di Ritorno';
        }
        return 'Altri Problemi';
    }

    private function suggestSolution(string $message): string
    {
        if (str_contains($message, 'undefined method')) {
            return 'Implementare il metodo mancante o correggere il nome del metodo chiamato';
        }
        if (str_contains($message, 'undefined property')) {
            return 'Definire la proprietà o aggiungere l\'annotazione @property nella classe';
        }
        if (str_contains($message, 'type')) {
            return 'Aggiungere o correggere i type hint e le annotazioni PHPDoc';
        }
        if (str_contains($message, 'parameter') || str_contains($message, 'argument')) {
            return 'Verificare e correggere i tipi dei parametri passati al metodo';
        }
        if (str_contains($message, 'return')) {
            return 'Aggiungere o correggere il tipo di ritorno del metodo';
        }
        return 'Analizzare il contesto specifico e applicare le best practices del progetto';
    }
} 