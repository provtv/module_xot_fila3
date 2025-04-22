<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Safe\Exceptions\DatetimeException;
use Safe\Exceptions\JsonException;
use Safe\Exceptions\PcreException;
=======

use function Safe\shell_exec;
>>>>>>> e2a4c5d (.)

class ImportMdbToSQLite extends Command
{
    /**
<<<<<<< HEAD
     * Il nome e la firma del comando console.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-sqlite 
                            {source : Percorso del file MDB sorgente} 
                            {destination : Percorso del file SQLite di destinazione} 
                            {--tables=* : Tabelle specifiche da importare} 
                            {--skip-data : Salta l\'importazione dei dati}';

    /**
     * La descrizione del comando console.
     *
     * @var string
     */
    protected $description = 'Importa un database MDB in SQLite';

    /**
     * Esegui il comando console.
     */
    public function handle(): int
    {
        $source = $this->argument('source');
        $destination = $this->argument('destination');
        $tables = $this->option('tables');
        $skipData = $this->option('skip-data');

        if (! file_exists($source)) {
            $this->error("Il file sorgente {$source} non esiste!");
            return 1;
        }

        try {
            $this->importSchema($source, $destination, $tables);
            
            if (! $skipData) {
                $this->importData($source, $destination, $tables);
            }

            $this->info('Importazione completata con successo!');
            return 0;
        } catch (\Exception $e) {
            $this->error('Errore durante l\'importazione: ' . $e->getMessage());
            return 1;
=======
     * Il nome e la firma del comando.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-sqlite';

    /**
     * La descrizione del comando.
     *
     * @var string
     */
    protected $description = 'Importa un file .mdb in SQLite con un processo passo-passo';

    /**
     * Esegui il comando.
     *
     * @return void
     */
    public function handle()
    {
        // Chiedi il percorso del file .mdb
        $mdbFile = $this->ask('Per favore, inserisci il percorso del file .mdb');

        // Chiedi il nome del file SQLite
        $sqliteDb = $this->ask('Per favore, inserisci il nome del database SQLite (includi l\'estensione .sqlite)');

        // Mostra i parametri ricevuti (opzionale, per verificare)
        $this->info("File .mdb: $mdbFile");
        $this->info("Database SQLite: $sqliteDb");

        // Esporta le tabelle dal file .mdb
        $this->info('Esportando tabelle dal file .mdb in CSV...');
        $tables = $this->exportTablesToCSV($mdbFile);

        // Crea le tabelle SQLite
        $this->info('Creando tabelle nel database SQLite...');
        $this->createTablesInSQLite($mdbFile, $sqliteDb);

        // Carica i dati CSV nelle tabelle SQLite
        $this->info('Importando i dati CSV nelle tabelle SQLite...');
        $this->importDataToSQLite($tables, $sqliteDb);

        $this->info('Processo completato!');
    }

    /**
     * Esporta tutte le tabelle dal file .mdb in formato CSV.
     *
     * @param string $mdbFile
     *
     * @return array
     */
    private function exportTablesToCSV($mdbFile)
    {
        $tables = [];
        $tableList = shell_exec("mdb-tables $mdbFile");

        // Esporta ogni tabella in un file CSV
        foreach (explode("\n", trim($tableList)) as $table) {
            if (empty($table)) {
                continue;
            }
            $tables[] = $table;
            $csvFile = storage_path("app/{$table}.csv");
            shell_exec("mdb-export $mdbFile $table > $csvFile");
        }

        return $tables;
    }

    /**
     * Crea le tabelle nel database SQLite basandosi sullo schema del file .mdb.
     *
     * @param string $mdbFile
     * @param string $sqliteDb
     */
    private function createTablesInSQLite($mdbFile, $sqliteDb)
    {
        $schema = shell_exec("mdb-schema $mdbFile sqlite");
        $tables = explode(";\n", $schema);

        foreach ($tables as $tableSchema) {
            if (empty($tableSchema)) {
                continue;
            }
            // Adatta le virgolette per SQLite
            $tableSchema = str_replace('`', '"', $tableSchema);

            // Crea la tabella in SQLite
            $command = "sqlite3 $sqliteDb \"$tableSchema;\"";
            shell_exec($command);
>>>>>>> e2a4c5d (.)
        }
    }

    /**
<<<<<<< HEAD
     * Importa lo schema del database.
     */
    protected function importSchema(string $source, string $destination, ?array $tables = null): void
    {
        // Implementazione dell'importazione dello schema
        $this->info('Importazione schema in corso...');
    }

    /**
     * Importa i dati del database.
     */
    protected function importData(string $source, string $destination, ?array $tables = null): void
    {
        // Implementazione dell'importazione dei dati
        $this->info('Importazione dati in corso...');
=======
     * Importa i dati CSV nelle tabelle SQLite.
     *
     * @param array  $tables
     * @param string $sqliteDb
     */
    private function importDataToSQLite($tables, $sqliteDb)
    {
        foreach ($tables as $table) {
            $csvFile = storage_path("app/{$table}.csv");
            $command = "sqlite3 $sqliteDb \".mode csv\" \".import $csvFile $table\"";
            shell_exec($command);
        }
>>>>>>> e2a4c5d (.)
    }
}
