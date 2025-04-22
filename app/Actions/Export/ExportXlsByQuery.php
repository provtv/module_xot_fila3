<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
=======
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Response;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Modules\Xot\Exports\QueryExport;
use Spatie\QueueableAction\QueueableAction;
// use Staudenmeir\LaravelCte\Query\Builder as CteBuilder;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByQuery
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    /**
     * Esporta i risultati di una query in Excel.
     *
     * @param Builder $query Query da esportare
     * @param string $filename Nome del file Excel
     * @param array<int, string> $fields Campi da includere nell'export
     * @param int|null $limit Limite di righe da esportare
     *
     * @return BinaryFileResponse
     */
    public function execute(
        Builder $query,
        string $filename = 'test.xlsx',
        array $fields = [],
        ?int $limit = null,
    ): BinaryFileResponse {
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(function ($field) {
<<<<<<< HEAD
<<<<<<< HEAD
            return strval($field);
=======
<<<<<<< HEAD
            return strval($field);
=======
            return is_string($field) ? $field : (string) $field;
>>>>>>> origin/dev
>>>>>>> origin/dev
=======

            return strval($field);
>>>>>>> 50bb41c (fix: auto resolve conflict)
        }, array_values($fields));

        $export = new QueryExport(
            query: $query,
            transKey: null,
            fields: $stringFields
        );
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD

=======
        
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
        // Note: QueryExport doesn't accept a limit parameter directly
        // If limit is needed, apply it to the query before passing to the exporter
        if ($limit !== null) {
            $query->limit($limit);
        }

        return Excel::download($export, $filename);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    public function execute(
        QueryBuilder|EloquentBuilder $query,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        array $fields = [],
    ): Response|BinaryFileResponse {
        $queryExport = new QueryExport($query, $transKey, $fields);
        // $queryExport->queue($filename); // Serialization of 'PDO' is not allowed

        return $queryExport->download($filename);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
