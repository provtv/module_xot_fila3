<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Doctrine\DBAL\Schema\AbstractSchemaManager;
<<<<<<< HEAD
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\DB;
=======
<<<<<<< HEAD
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\DB;
=======
use Illuminate\Database\Eloquent\Model as EloquentModel;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetSchemaManagerByModelClassAction
{
    use QueueableAction;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
    /**
     * Ottiene lo schema manager Doctrine per una classe di modello Eloquent.
     *
     * @param string $modelClass La classe del modello
     * @return AbstractSchemaManager Lo schema manager di Doctrine
     */
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    public function execute(string $modelClass): AbstractSchemaManager
    {
        Assert::isInstanceOf($model = app($modelClass), EloquentModel::class);
        $connection = $model->getConnection();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
        
        // In Laravel 9+ il metodo getDoctrineSchemaManager è stato deprecato
        // ma getDoctrineConnection() non esiste, dobbiamo usare getDoctrineSchemaManager direttamente
        if (method_exists($connection, 'getDoctrineSchemaManager')) {
            /** @phpstan-ignore deprecated.method */
            return $connection->getDoctrineSchemaManager();
        }

        // Se in futuro il metodo getDoctrineConnection diventa disponibile, possiamo usare questo
        throw new \RuntimeException('Non è possibile ottenere lo schema manager Doctrine per questo modello.');
<<<<<<< HEAD
=======
=======

        return $connection->getDoctrineSchemaManager();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
    }
}
