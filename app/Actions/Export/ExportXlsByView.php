<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

// use Modules\Xot\Services\ArrayService;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\ViewExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByView
{
    use QueueableAction;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
    /**
     * Esporta una vista in Excel.
     *
     * @param View $view Vista da esportare
     * @param string $filename Nome del file Excel
     * @param array<string>|null $fields Campi da includere nell'export
     * 
     * @return BinaryFileResponse
     */
    public function execute(
        View $view,
        string $filename = 'test.xlsx',
        ?array $fields = null,
    ): BinaryFileResponse {
        // Se $fields non è null, assicuriamo che sia un array di stringhe
        $stringFields = null;
        if (is_array($fields)) {
<<<<<<< HEAD
            $stringFields = array_map(function ($field) {
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
            $stringFields = array_map(function (string|int|float|bool $field): string {
                return (string) $field;
>>>>>>> 50bb41c (fix: auto resolve conflict)
            }, array_values($fields));
        }

        $export = new ViewExport(
            view: $view,
            transKey: null,
            fields: $stringFields
        );
<<<<<<< HEAD
=======
=======
    public function execute(
        View $view,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        ?array $fields = null,
    ): BinaryFileResponse {
        $export = new ViewExport($view, $transKey, $fields);
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)

        return Excel::download($export, $filename);
    }
}
