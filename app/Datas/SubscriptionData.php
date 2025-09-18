<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class SubscriptionData - Gestisce la configurazione degli abbonamenti per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class SubscriptionData extends Data
{
    /**
     * @param  bool  $enable  Se il sistema di abbonamenti è abilitato
     * @param  string  $driver  Driver per gli abbonamenti (stripe, paddle, ecc.)
     * @param  array<string, mixed>  $plans  Piani di abbonamento disponibili
     * @param  string  $currency  Valuta predefinita
     * @param  array<int, class-string>  $allowed_models  Modelli abilitati per gli abbonamenti
     * @param  bool  $trial_enabled  Se abilitare i periodi di prova
     * @param  int  $trial_days  Durata periodo di prova in giorni
     */
    public function __construct(): void {}

    /**
     * Create a new instance of SubscriptionData with default values.
     */
    public static function make(): static
    {
        return new static;
    }
}
