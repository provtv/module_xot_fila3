<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class SaveJsonArrayAction
{
    use QueueableAction;

    /**
     * Salva un array come file JSON.
     *
     * @param array<string, mixed> $data L'array da salvare come JSON
     * @param string $filename Il percorso completo del file in cui salvare il JSON
     *
     * @return bool True se il salvataggio è avvenuto con successo, false altrimenti
     */
    public function execute(array $data, string $filename): bool
    {
        $content = \Safe\json_encode($data, JSON_PRETTY_PRINT);
        
        // Non è necessario verificare se $content è false perché \Safe\json_encode
        // lancia un'eccezione in caso di errore invece di restituire false
        
        return (bool) \Safe\file_put_contents($filename, $content);
    }
}
