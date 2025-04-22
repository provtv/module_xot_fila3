<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Store;

use Fidum\EloquentMorphToOne\MorphToOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
/**
 * Azione per gestire le relazioni morphToOne nei modelli.
 */
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
/**
 * Azione per gestire le relazioni morphToOne nei modelli.
 */
>>>>>>> 4ab3760 (.)
class MorphToOneAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
<<<<<<< HEAD
        //if ($relationDTO === null) {
        //    return;
        //}
=======
<<<<<<< HEAD
        //if ($relationDTO === null) {
        //    return;
        //}
=======
        if ($relationDTO === null) {
            return;
        }
>>>>>>> origin/dev
>>>>>>> origin/dev

        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);

=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)
    /**
     * Esegue l'azione di creazione per una relazione morphToOne.
     *
     * @param Model $model Il modello su cui operare
     * @param RelationDTO $relationDTO I dati della relazione da creare
     */
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);

<<<<<<< HEAD
=======
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);
        // dddx(['row' => $row, 'relation' => $relation, 'relation_data' => $relation->data]);

        // if (is_array($relation->data)) {
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        if (! isset($relationDTO->data['lang'])) {
            $relationDTO->data['lang'] = App::getLocale();
        }

<<<<<<< HEAD
<<<<<<< HEAD
        //if ($rows !== null) {
        $rows->create($relationDTO->data);
        //}
=======
<<<<<<< HEAD
        //if ($rows !== null) {
        $rows->create($relationDTO->data);
        //}
=======
        if ($rows !== null) {
            $rows->create($relationDTO->data);
        }
>>>>>>> origin/dev
>>>>>>> origin/dev
=======
        $rows->create($relationDTO->data);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
        // } else {
        //    $rows->sync($relation->data);
        // }

        /*
        dddx([
            'message' => 'wip',
            'row' => $row,
            'relation' => $relation,
            'relation_rows' => $relation->rows->exists(),
            't' => $row->{$relation->name},
        ]);

        dddx('wip');
        */
<<<<<<< HEAD
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
