<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Actions;

use Filament\Actions\Action;
use Spatie\QueueableAction\QueueableAction;

class ExportButton
{
    use QueueableAction;

    public function execute(): Action
    {
        return Action::make('export')
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
            ->tooltip('export XLS')
            ->icon('heroicon-o-inbox-arrow-down')
            // ->visible(null != $year)
            ->action(static fn () => dddx('WIP'));
    }
}
