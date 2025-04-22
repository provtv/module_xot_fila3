<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Http\Response;
use Illuminate\Support\LazyCollection;
<<<<<<< HEAD
use Maatwebsite\Excel\Facades\Excel;
=======
<<<<<<< HEAD
use Maatwebsite\Excel\Facades\Excel;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
use Modules\Xot\Exports\LazyCollectionExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByLazyCollection
{
    use QueueableAction;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
    /**
     * Esporta una lazy collection in Excel.
     *
     * @param LazyCollection $collection La lazy collection da esportare
     * @param string $filename Nome del file Excel
     * @param array<int, string> $fields Campi da includere nell'export
     * 
     * @return BinaryFileResponse
     */
    public function execute(
        LazyCollection $collection,
        string $filename = 'test.xlsx',
        array $fields = [],
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

        $export = new LazyCollectionExport(
            $collection,
            $filename,
            $stringFields
        );

        return Excel::download($export, $filename);
<<<<<<< HEAD
=======
=======
    public function execute(
        LazyCollection $collection,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        array $fields = [],
    ): Response|BinaryFileResponse {
        $export = new LazyCollectionExport($collection, $transKey, $fields);

        return $export->download($filename);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }
}
