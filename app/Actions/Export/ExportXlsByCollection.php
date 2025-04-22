<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\CollectionExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

class ExportXlsByCollection
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
     * Esporta una collezione in Excel.
     *
     * @param Collection $collection La collezione da esportare
     * @param string $filename Nome del file Excel
     * @param string|null $transKey Chiave di traduzione per i campi
     * @param array<int, string> $fields Campi da includere nell'export
     *
     * @return BinaryFileResponse
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public function execute(
        Collection $collection,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        array $fields = [],
    ): BinaryFileResponse {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(function (string|int|float|bool $field): string {
            return (string) $field;
        }, array_values($fields));

        $export = new CollectionExport(
            collection: $collection,
            transKey: $transKey,
            fields: $stringFields
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        $export = new CollectionExport(
            collection: $collection,
            transKey: $transKey,
            fields: $fields
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        );

        return Excel::download($export, $filename);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

    /**
     * Esporta una collezione in Excel utilizzando PhpSpreadsheet direttamente.
     *
     * @param Collection $rows La collezione da esportare
     * @param array<string> $fields Campi da includere nell'export
     * @param string $filename Nome del file Excel
     *
     * @return string Il percorso del file generato
     */
    public function executeWithSpreadsheet(Collection $rows, array $fields, string $filename): string
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $this->writeHeader($sheet, $fields);
        $this->writeRows($sheet, $rows, $fields);

        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $filename;
    }

    /**
     * Scrive l'intestazione nel foglio Excel.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet Il foglio Excel
     * @param array<string> $fields I campi da utilizzare come intestazioni
     */
    protected function writeHeader(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet, array $fields): void
    {
        foreach ($fields as $col => $field) {
            $sheet->setCellValueByColumnAndRow($col + 1, 1, $field);
        }
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
     * Scrive le righe nel foglio di lavoro.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet Il foglio di lavoro
     * @param \Illuminate\Support\Collection $rows I dati da scrivere
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
     * Scrive le righe di dati nel foglio Excel.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet Il foglio Excel
     * @param Collection $rows Le righe di dati da scrivere
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
     * @param array<string> $fields I campi da utilizzare per le colonne
     */
    protected function writeRows(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet, Collection $rows, array $fields): void
    {
        $row = 2;
        foreach ($rows as $data) {
            foreach ($fields as $col => $field) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
=======


>>>>>>> 50bb41c (fix: auto resolve conflict)
                $value = '';

                // Verifica che $data supporti il metodo get
                if (is_object($data) && method_exists($data, 'get')) {
                    $value = $data->get($field) ?? '';
                } elseif (is_array($data) || $data instanceof \ArrayAccess) {
                    $value = $data[$field] ?? '';
                } elseif (is_object($data) && property_exists($data, $field)) {
                    $value = $data->{$field} ?? '';
                }
<<<<<<< HEAD

<<<<<<< HEAD
=======
=======
                $value = $data->get($field) ?? '';
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
                $sheet->setCellValueByColumnAndRow($col + 1, $row, $value);
            }
            $row++;
        }
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
}
