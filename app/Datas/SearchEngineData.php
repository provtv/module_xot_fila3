<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class SearchEngineData - Gestisce la configurazione dei motori di ricerca per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class SearchEngineData extends Data
{
    /**
     * @param  string  $driver  Driver del motore di ricerca (algolia, meilisearch, ecc.)
     * @param  string  $algolia_app_id  Algolia App ID
     * @param  string  $algolia_secret  Chiave segreta Algolia
     * @param  string  $meili_host  Host MeiliSearch
     * @param  string  $meili_key  Chiave MeiliSearch
     * @param  bool  $enable_local  Abilita la ricerca locale
     * @param  array<int, class-string>  $searchable  Modelli cercabili
     */
    public function __construct(): void {}

    /**
     * Create a new instance of SearchEngineData with default values.
     */
    public static function make(): static
    {
        return new static;
    }
}
