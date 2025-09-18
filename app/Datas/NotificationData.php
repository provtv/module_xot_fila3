<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class NotificationData - Gestisce la configurazione delle notifiche per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class NotificationData extends Data
{
    /**
     * @param array  $channels        Canali di notifica disponibili
     * @param string $default_channel Canale predefinito
     * @param bool   $queue           Se accodare le notifiche
     * @param array  $mail            Configurazione email di notifica
     * @param array  $broadcast       Configurazione broadcast
     * @param array  $slack           Configurazione Slack
     * @param array  $telegram        Configurazione Telegram
     */
    public function __construct(): void {
    }

    /**
     * Create a new instance of NotificationData with default values.
     *
     * @return static
     */
    public static function make(): static
    {
        return new static();
    }
}
