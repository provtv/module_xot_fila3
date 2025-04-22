<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
<<<<<<< HEAD
=======
=======
 */
abstract class XotBaseTableAction extends Action
{
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    public function getRecord(): ?Model
    {
        return $this->record;
    }
}
