<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Query;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

final class GetFieldnamesByTablenameAction
{
    use QueueableAction;

    /**
     * Get column names from a table with specific database connection.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string $table          Table name to get columns from
=======
<<<<<<< HEAD
     * @param string $table Table name to get columns from
=======
     * @param string      $table          Table name to get columns from
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
     * @param string $table Table name to get columns from
>>>>>>> 4ab3760 (.)
     * @param string|null $connectionName Database connection name (optional)
     *
     * @throws \InvalidArgumentException
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return list
=======
<<<<<<< HEAD
     * @return list<string> Lista dei nomi delle colonne della tabella
=======
     * @return list
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
     * @return list<string> Lista dei nomi delle colonne della tabella
>>>>>>> 4ab3760 (.)
     */
    public function execute(string $table, ?string $connectionName = null): array
    {
        // Validate table name
        if (empty(trim($table))) {
            throw new \InvalidArgumentException('Table name cannot be empty.');
        }

        // Use default connection if none is provided
        Assert::string($connectionName = $connectionName ?? config('database.default'));

        // Validate database connection
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s',  $connectionName));
=======
=======
>>>>>>> 4ab3760 (.)
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
>>>>>>> 50bb41c (fix: auto resolve conflict)
        }

        // Check if table exists in the database
        if (! Schema::connection($connectionName)->hasTable($table)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table,  $connectionName));
<<<<<<< HEAD
=======
=======
        if (! $this->isValidConnection(is_string($connectionName) ? $connectionName : (string) $connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', is_string($connectionName) ? $connectionName : (string) $connectionName));
        }

        // Check if table exists in the database
        if (! Schema::connection(is_string($connectionName) ? $connectionName : (string) $connectionName)->hasTable($table)) {
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, is_string($connectionName) ? $connectionName : (string) $connectionName));
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, $connectionName));
<<<<<<< HEAD
=======
        if (! $this->isValidConnection((string) $connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', (string) $connectionName));
        }

        // Check if table exists in the database
        if (! Schema::connection((string) $connectionName)->hasTable($table)) {
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, (string) $connectionName));
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        }

        // Get and return column listing
        try {
            $columns = Schema::connection($connectionName)->getColumnListing($table);
            $columns = array_values($columns);
<<<<<<< HEAD
<<<<<<< HEAD
            // $columns = array_map('strval', $columns);

            return $columns;
            // return array_values(array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns));
=======
<<<<<<< HEAD
            
            // Assicuriamoci che tutti i valori siano stringhe
            return array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns);
=======
            // $columns = array_map('strval', $columns);

            return $columns;
            // return array_values(array_map(static fn ($value): string => (string) $value, $columns));
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======

            // Assicuriamoci che tutti i valori siano stringhe
            return array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns);
>>>>>>> 4ab3760 (.)
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException(sprintf('Error fetching columns from table "%s": %s', $table, $e->getMessage()));
        }
    }

    /**
     * Check if a given database connection is valid.
     */
    private function isValidConnection(string $connectionName): bool
    {
        try {
            DB::connection($connectionName)->getPdo();

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
