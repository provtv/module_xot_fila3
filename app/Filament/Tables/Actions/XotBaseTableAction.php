<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
 */
abstract class XotBaseTableAction extends Action
{
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public function getRecord(): ?Model
    {
        return $this->record;
    }
}
