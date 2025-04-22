<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Safe\Exceptions\DatetimeException;
use Safe\Exceptions\JsonException;
use Safe\Exceptions\PcreException;

use function Safe\shell_exec;

use Webmozart\Assert\Assert;

class ImportMdbToMySQL extends Command
{
    /**
     * Il nome e la firma del comando console.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-mysql
                            {source : Percorso del file MDB sorgente}
                            {connection : Nome della connessione MySQL}
                            {--tables=* : Tabelle specifiche da importare}
                            {--skip-data : Salta l\'importazione dei dati}';

    /**
     * La descrizione del comando console.
     *
     * @var string
     */
    protected $description = 'Importa un database MDB in MySQL';

    /**
     * Esegui il comando console.
     */
    public function handle(): int
    {
        $source = $this->argument('source');
        $connection = $this->argument('connection');
        $tables = $this->option('tables');
        $skipData = $this->option('skip-data');

        if (! file_exists($source)) {
            $this->error("Il file sorgente {$source} non esiste!");
            return 1;
        }

        try {
            // Ottieni le credenziali dalla configurazione di connessione
            $config = config("database.connections.{$connection}");
            if (!$config) {
                $this->error("Connessione {$connection} non trovata nella configurazione database.");
                return 1;
            }

            $mysqlUser = $config['username'] ?? '';
            $mysqlPassword = $config['password'] ?? '';
            $mysqlDb = $config['database'] ?? '';

            $this->importSchema($source, $mysqlUser, $mysqlPassword, $mysqlDb, $tables);

            if (! $skipData) {
                $this->importData($source, $mysqlUser, $mysqlPassword, $mysqlDb, $tables);
            }

            $this->info('Importazione completata con successo!');
            return 0;
        } catch (\Exception $e) {
            $this->error('Errore durante l\'importazione: ' . $e->getMessage());
            return 1;
        }
    }

    /**
     * Importa lo schema del database.
     */
    protected function importSchema(string $source, string $mysqlUser, string $mysqlPassword, string $mysqlDb, ?array $tables = null): void
    {
        $this->info('Importazione schema in corso...');

        $this->createDatabase($mysqlUser, $mysqlPassword, $mysqlDb);
        $this->createTablesInMySQL($source, $mysqlUser, $mysqlPassword, $mysqlDb, $tables);
    }

    /**
     * Importa i dati del database.
     */
    protected function importData(string $source, string $mysqlUser, string $mysqlPassword, string $mysqlDb, ?array $tables = null): void
    {
        $this->info('Importazione dati in corso...');

        $exportedTables = $this->exportTablesToCSV($source, $tables);
        $this->importDataToMySQL($source, $mysqlUser, $mysqlPassword, $mysqlDb, $exportedTables);
    }

    /**
     * Crea il database MySQL se non esiste.
     */
    private function createDatabase(string $mysqlUser, string $mysqlPassword, string $mysqlDb): void
    {
        $command = "mysql -u $mysqlUser -p$mysqlPassword -e 'CREATE DATABASE IF NOT EXISTS $mysqlDb;'";
        shell_exec($command);
    }

    /**
     * Esporta le tabelle specificate dal file .mdb in formato CSV.
     *
     * @return array Le tabelle esportate
     */
    private function exportTablesToCSV(string $mdbFile, ?array $specificTables = null): array
    {
        $exportedTables = [];
        $tableList = shell_exec("mdb-tables $mdbFile");

        foreach (explode("\n", trim($tableList)) as $table) {
            if (empty($table)) {
                continue;
            }

            // Se sono state specificate delle tabelle, controlla se questa è inclusa
            if ($specificTables && !in_array($table, $specificTables)) {
                continue;
            }

            $exportedTables[] = $table;
            $csvFile = storage_path("app/{$table}.csv");
            shell_exec("mdb-export $mdbFile $table > $csvFile");
            $this->info("Tabella esportata: $table");
        }

        return $exportedTables;
    }

    /**
     * Crea le tabelle nel database MySQL basandosi sullo schema del file .mdb.
     */
    private function createTablesInMySQL(string $mdbFile, string $mysqlUser, string $mysqlPassword, string $mysqlDb, ?array $specificTables = null): void
    {
        $schema = shell_exec("mdb-schema $mdbFile mysql");
        $tables = explode(";\n", $schema);

        foreach ($tables as $tableSchema) {
            if (empty($tableSchema)) {
                continue;
            }

            // Verifica se questa tabella è inclusa nell'elenco specificato
            if ($specificTables) {
                $tableNameMatch = [];
                if (preg_match('/CREATE TABLE `([^`]+)`/', $tableSchema, $tableNameMatch)) {
                    $tableName = $tableNameMatch[1];
                    if (!in_array($tableName, $specificTables)) {
                        continue;
                    }
                } else {
                    continue; // Non siamo riusciti a identificare il nome della tabella
                }
            }

            // Adatta le virgolette per MySQL
            $tableSchema = str_replace('`', '"', $tableSchema);
            // Crea la tabella in MySQL
            $command = "mysql -u $mysqlUser -p$mysqlPassword $mysqlDb -e \"$tableSchema;\"";
            shell_exec($command);
        }
    }

    /**
     * Importa i dati CSV nelle tabelle MySQL.
     */
    private function importDataToMySQL(string $mdbFile, string $mysqlUser, string $mysqlPassword, string $mysqlDb, array $tables): void
    {
        foreach ($tables as $table) {
            $csvFile = storage_path("app/{$table}.csv");
            $command = "mysql -u $mysqlUser -p$mysqlPassword $mysqlDb -e "
                ."\"LOAD DATA LOCAL INFILE '$csvFile' "
                ."INTO TABLE $table "
                ."FIELDS TERMINATED BY ',' "
                ."ENCLOSED BY '\"' "
                ."LINES TERMINATED BY '\\n' "
                .'IGNORE 1 LINES;"';
            shell_exec($command);
            $this->info("Dati importati per la tabella: $table");
        }
    }
}
