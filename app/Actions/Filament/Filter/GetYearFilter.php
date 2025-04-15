<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Filter;

use Filament\Tables\Filters\SelectFilter;
use Spatie\QueueableAction\QueueableAction;

class GetYearFilter
{
    use QueueableAction;

    /**
     * Undocumented function.
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
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
=======
            $opts[is_string($curr) ? $curr : (string) $curr] = is_string($curr) ? $curr : (string) $curr;
>>>>>>> origin/dev
>>>>>>> origin/dev
        }

        return SelectFilter::make($fieldName)
            ->options($opts);
    }
}
