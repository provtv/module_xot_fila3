<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class PwaData - Gestisce la configurazione PWA per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class PwaData extends Data
{
    /**
     * @param  bool  $enable  Se il PWA è abilitato
     * @param  string  $name  Nome dell'applicazione
     * @param  string  $short_name  Nome breve dell'applicazione
     * @param  string  $description  Descrizione dell'applicazione
     * @param  string  $background_color  Colore di sfondo
     * @param  string  $theme_color  Colore del tema
     * @param  string  $icon_path  Percorso dell'icona
     * @param  array<string, string>  $splash  Configurazione splash screen
     */
    public function __construct(): void {}

    /**
     * Create a new instance of PwaData with default values.
     */
    public static function make(): static
    {
        return new static;
    }
}
