<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Store;

use Fidum\EloquentMorphToOne\MorphToOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Azione per gestire le relazioni morphToOne nei modelli.
 */
class MorphToOneAction
{
    use QueueableAction;

    /**
     * Esegue l'azione di creazione per una relazione morphToOne.
     *
     * @param Model $model Il modello su cui operare
     * @param RelationDTO $relationDTO I dati della relazione da creare
     */
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
        Assert::isInstanceOf($rows = $relationDTO->rows, MorphToOne::class);

        if (! isset($relationDTO->data['lang'])) {
            $relationDTO->data['lang'] = App::getLocale();
        }

        $rows->create($relationDTO->data);
    }
}
