<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Actions;

use Filament\Actions\Action;
use Spatie\QueueableAction\QueueableAction;

class ImportButton
{
    use QueueableAction;

    public function execute(): Action
    {
        return Action::make('import')
<<<<<<< HEAD
<<<<<<< HEAD
            
=======
<<<<<<< HEAD
            
=======
            ->label('')
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======

>>>>>>> 4ab3760 (.)
            ->tooltip('import XLS')
            ->icon('heroicon-o-arrow-up-on-square')
            // ->visible(null != $year)
            ->action(static fn () => dddx('WIP'));
    }
}
