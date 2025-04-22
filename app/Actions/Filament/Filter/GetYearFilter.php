<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Filter;

use Filament\Tables\Filters\SelectFilter;
use Spatie\QueueableAction\QueueableAction;

class GetYearFilter
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Undocumented function.
=======
<<<<<<< HEAD
     * Crea un filtro per selezionare un anno all'interno di un intervallo.
     *
     * @param string $fieldName Il nome del campo su cui filtrare
     * @param int $from L'anno di inizio dell'intervallo
     * @param int $to L'anno di fine dell'intervallo
     *
     * @return SelectFilter Il filtro Filament configurato
=======
     * Undocumented function.
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
     */
    public function execute(string $fieldName, int $from, int $to): SelectFilter
    {
        $opts = [];
        for ($curr = $from; $curr <= $to; ++$curr) {
<<<<<<< HEAD
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
=======
<<<<<<< HEAD
<<<<<<< HEAD
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
=======
            $opts[is_string($curr) ? $curr : (string) $curr] = is_string($curr) ? $curr : (string) $curr;
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
            $opts[(string) $curr] = (string) $curr;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
        }

        return SelectFilter::make($fieldName)
            ->options($opts);
    }
}
