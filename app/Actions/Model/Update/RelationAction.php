<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Model\FilterRelationsAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class RelationAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(Model $model, array $data): void
    {
        $relations = app(FilterRelationsAction::class)->execute($model, $data);
        /*
        if ('Operation' === class_basename($model)) {
            dddx([
                'basename' => class_basename($model),
                'model' => $model,
                'data' => $data,
                'relations' => $relations,
            ]);
        }
        // */
        foreach ($relations as $relation) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            // Ottieni il tipo di relazione dal nome della classe
            $relationClass = get_class($relation);
            $relationshipType = class_basename($relationClass);

            $actionClass = __NAMESPACE__.'\\'.$relationshipType.'Action';
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
            $actionClass = __NAMESPACE__.'\\'.$relation->relationship_type.'Action';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
            Assert::object($action = app($actionClass));

            if (method_exists($action, 'execute')) {
                $action->execute($model, $relation);
            }
        }
    }
}
