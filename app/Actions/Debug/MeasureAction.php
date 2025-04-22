<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Debug;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
use Webmozart\Assert\Assert;

/**
 * Classe per misurare le performance di esecuzione di un blocco di codice.
 * 
 * @template T
 */
class MeasureAction
{
    /**
     * Esegue una closure misurando il tempo di esecuzione e l'utilizzo di memoria.
     *
     * @param \Closure():T $closure La closure da eseguire e misurare
     * @param string $label Etichetta opzionale per identificare la misurazione
     * 
     * @return T Il risultato dell'esecuzione della closure
     */
    public function execute(\Closure $closure, string $label = ''): mixed
    {
        Assert::isCallable($closure, 'Il parametro $closure deve essere una funzione chiamabile');
        
        $start = microtime(true);
        $memory_start = memory_get_usage();

        // Eseguiamo la closure e otteniamo il risultato
<<<<<<< HEAD
=======
=======

class MeasureAction
{
    public function execute(\Closure $closure, string $label = ''): mixed
    {
        $start = microtime(true);
        $memory_start = memory_get_usage();

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        $result = $closure();

        $end = microtime(true);
        $memory_end = memory_get_usage();

<<<<<<< HEAD
        // Calcoliamo le metriche di performance
        $execution_time = ($end - $start) * 1000; // Conversione in millisecondi
        $memory_usage = ($memory_end - $memory_start) / 1024; // Conversione in KB
=======
<<<<<<< HEAD
        // Calcoliamo le metriche di performance
        $execution_time = ($end - $start) * 1000; // Conversione in millisecondi
        $memory_usage = ($memory_end - $memory_start) / 1024; // Conversione in KB
=======
        $execution_time = ($end - $start) * 1000; // Convert to milliseconds
        $memory_usage = ($memory_end - $memory_start) / 1024; // Convert to KB
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)

        $metrics = [
            'label' => $label,
            'execution_time' => round($execution_time, 2).' ms',
            'memory_usage' => round($memory_usage, 2).' KB',
            // 'peak_memory' => round(memory_get_peak_usage() / 1024 / 1024, 2).' MB',
        ];

<<<<<<< HEAD
        // Mostriamo una notifica con le metriche
        Notification::make()
            ->title('Performance Metrics '.($label !== '' ? $label : 'Unnamed'))
=======
<<<<<<< HEAD
        // Mostriamo una notifica con le metriche
        Notification::make()
            ->title('Performance Metrics '.($label !== '' ? $label : 'Unnamed'))
=======
        Notification::make()
            ->title('Performance Metrics '.$label)
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
            ->body($metrics['execution_time'].'  '.$metrics['memory_usage'])
            ->success()
            ->persistent()
            ->send();

        // Log::debug('Performance Metrics', $metrics);

<<<<<<< HEAD
        /** @var T $result */
=======
<<<<<<< HEAD
        /** @var T $result */
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        return $result;
    }
}
