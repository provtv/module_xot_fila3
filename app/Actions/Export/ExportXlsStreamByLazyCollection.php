<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;

use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;

class ExportXlsStreamByLazyCollection
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
     * Esporta una LazyCollection in un file CSV streamed.
     *
     * @param LazyCollection $data I dati da esportare
     * @param string $filename Nome del file CSV
     * @param string|null $transKey Chiave di traduzione per le intestazioni
     * @param array<string>|null $fields Campi da includere nell'export
     *
     * @return StreamedResponse
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
        LazyCollection $data,
        string $filename = 'test.csv',
        ?string $transKey = null,
        ?array $fields = null,
    ): StreamedResponse {
        $headers = [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'Content-Disposition' => 'attachment; filename=' . $filename,
=======
<<<<<<< HEAD
            'Content-Disposition' => 'attachment; filename=' . $filename,
=======
            'Content-Disposition' => 'attachment; filename='.$filename,
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
=======
>>>>>>> 4ab3760 (.)
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
<<<<<<< HEAD
=======
            'Content-Disposition' => 'attachment; filename='.$filename,
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        ];
        $head = $this->headings($data, $transKey);

        return response()->stream(
            static function () use ($data, $head): void {
                $file = fopen('php://output', 'w+');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev

                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item) {
                    //return is_string($item) ? $item : (string) $item;
                    return strval($item);
                }, $head);

<<<<<<< HEAD
=======
=======
                
                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item) {
                    return is_string($item) ? $item : (string) $item;
                }, $head);
                
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
=======
>>>>>>> 4ab3760 (.)



                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item): string {
                    return strval($item);
                }, $head);
>>>>>>> 50bb41c (fix: auto resolve conflict)
                fputcsv($file, $headStrings);

                foreach ($data as $key => $value) {
                    // Gestiamo sia oggetti che possono essere convertiti ad array che array diretti
                    if (is_object($value) && method_exists($value, 'toArray')) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value->toArray();
                    } elseif (is_array($value)) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value;
                    } else {
                        // Se non è né un oggetto con toArray né un array, saltiamo
                        continue;
                    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD

=======
                    
>>>>>>> origin/dev
>>>>>>> origin/dev
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item) {
=======
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item): ?string {
>>>>>>> 50bb41c (fix: auto resolve conflict)
                        if ($item === null) {
                            return null;
                        }
                        return is_string($item) ? $item : (string) $item;
                    }, $rowData);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev

                    fputcsv($file, $safeRowData);
                }

<<<<<<< HEAD
=======
=======
                    
                    fputcsv($file, $safeRowData);
                }
                
>>>>>>> origin/dev
>>>>>>> origin/dev
=======

                    fputcsv($file, $safeRowData);
                }
>>>>>>> 50bb41c (fix: auto resolve conflict)
                // Aggiungiamo righe vuote alla fine
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
                fputcsv($file, $head);

                foreach ($data as $key => $value) {
                    // if(!method_exists($value,'toArray')){
                    //    throw new \Exception('WIP['.__LINE__.']['.class_basename($this).']');
                    // }
                    /** @phpstan-ignore method.nonObject */
                    $data = $value->toArray();

                    fputcsv($file, $data);
                }
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                $blanks = ["\t", "\t", "\t", "\t"];
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                fputcsv($file, $blanks);

                fclose($file);
            },
            200,
            $headers
        );
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    /**
     * Ottiene le intestazioni per l'export.
     *
     * @param LazyCollection $data I dati da cui estrarre le intestazioni
     * @param string|null $transKey Chiave di traduzione per le intestazioni
     *
     * @return array<string>
     */
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $first = $data->first();
        if (!is_array($first) && (!is_object($first) || !method_exists($first, 'toArray'))) {
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }
<<<<<<< HEAD
<<<<<<< HEAD

        $headArray = is_array($first) ? $first : $first->toArray();

=======
<<<<<<< HEAD

        $headArray = is_array($first) ? $first : $first->toArray();

=======
        
        $headArray = is_array($first) ? $first : $first->toArray();
        
>>>>>>> origin/dev
>>>>>>> origin/dev
=======


        $headArray = is_array($first) ? $first : $first->toArray();
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        /** 
         * @var array<string, mixed> $headArray 
         * @var \Illuminate\Support\Collection<int, string> $headings 
=======
        /**
         * @var array<string, mixed> $headArray
         * @var \Illuminate\Support\Collection<int, string> $headings
>>>>>>> 4ab3760 (.)
         */
        $headings = collect($headArray)->keys();
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
=======


>>>>>>> 50bb41c (fix: auto resolve conflict)

        if (null !== $transKey) {
            $headings = $headings->map(
                static function (string $item) use ($transKey) {
                    $key = $transKey . '.fields.' . $item;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
        
=======
=======
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        /**
         * @var array
         */
        $head = $data->first();
        $headings = collect($head)->keys();
>>>>>>> 50bb41c (fix: auto resolve conflict)
        if (null !== $transKey) {
            $headings = $headings->map(
                static function (string $item) use ($transKey) {
                    $key = $transKey.'.fields.'.$item;
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                    $trans = trans($key);
                    if ($trans !== $key) {
                        return $trans;
                    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 4ab3760 (.)

>>>>>>> 50bb41c (fix: auto resolve conflict)
                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;
<<<<<<< HEAD
=======
                    Assert::string($item1 = Str::replace('.', '_', $item), '['.__LINE__.']['.__CLASS__.']');
                    $key = $transKey.'.fields.'.$item1;
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
                    $trans = trans($key);
                    if ($trans !== $key) {
                        return $trans;
                    }

                    return $item;
                }
            );
        }

        /** @var array<string> */
<<<<<<< HEAD
        return $headings->map(fn($item) => strval($item))->toArray();
=======
<<<<<<< HEAD
        return $headings->map(fn($item) => strval($item))->toArray();
=======
        return $headings->map(fn ($item) => is_string($item) ? $item : (string) $item)->toArray();
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
<<<<<<< HEAD
        /** @var array<string> */
        return $headings->map(fn($item): string => strval($item))->toArray();
<<<<<<< HEAD
=======
        return $headings->toArray();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
