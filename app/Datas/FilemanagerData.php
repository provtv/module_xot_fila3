<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class FilemanagerData - Gestisce la configurazione del file manager per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class FilemanagerData extends Data
{
    /**
     * @param string $disk        Disco di storage predefinito
     * @param array  $disks       Dischi di storage disponibili
     * @param array  $allowed_ext Estensioni file consentite
     * @param int    $max_size    Dimensione massima file in MB
     * @param string $route_prefix Prefisso per le rotte del file manager
     * @param bool   $enable_crop Abilita il crop delle immagini
     */
    public function __construct(): void {
    }

    /**
     * Create a new instance of FilemanagerData with default values.
     *
     * @return static
     */
    public static function make(): static
    {
        return new static();
    }
}
