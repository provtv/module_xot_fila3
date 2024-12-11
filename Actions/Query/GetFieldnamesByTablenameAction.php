<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Query;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\QueueableAction\QueueableAction;

final class GetFieldnamesByTablenameAction
{
    use QueueableAction;

    /**
     * Get column names from a table with specific database connection.
     *
     * @param string      $table          Table name to get columns from
     * @param string|null $connectionName Database connection name (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return array<int, string>
     */
    public function execute(string $table, ?string $connectionName = null): array
    {
        // Validate table name
        if (empty(trim($table))) {
            throw new \InvalidArgumentException('Table name cannot be empty.');
        }

        // Use default connection if none is provided
        $connectionName = $connectionName ?? config('database.default');

        // Validate database connection
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
        }

        // Check if table exists in the database
        if (! Schema::connection($connectionName)->hasTable($table)) {
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, $connectionName));
        }

        // Get and return column listing
        try {
            $columns = Schema::connection($connectionName)->getColumnListing($table);

            return array_values(array_map('strval', $columns));
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