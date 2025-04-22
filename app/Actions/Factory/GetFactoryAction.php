<?php

declare(strict_types=1);

/**
 * @see https://github.com/TheDoctor0/laravel-factory-generator. 24 days ago
 * @see https://github.com/mpociot/laravel-test-factory-helper  on 2 Mar 2020.
 * @see https://github.com/laravel-shift/factory-generator on 10 Aug.
 * @see https://dev.to/marcosgad/make-factory-more-organized-laravel-3c19.
 * @see https://medium.com/@yohan7788/seeders-and-faker-in-laravel-6806084a0c7.
 */

namespace Modules\Xot\Actions\Factory;

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)

/**
 * @see https://github.com/mpociot/laravel-test-factory-helper/blob/master/src/Console/GenerateCommand.php#L213
 */
class GetFactoryAction
{
    use QueueableAction;

    /**
     * Execute the function with the given model class.
     *
     * @param string $model_class the class name of the model
     *
     * @throws \Exception Generating Factory [factory_class] press [F5] to refresh page [__LINE__][__FILE__]
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
     * @return Factory
     */
    public function execute(string $model_class): Factory
    {
        Assert::stringNotEmpty($model_class, 'Model class non può essere vuota');
        Assert::classExists($model_class, "La classe del modello $model_class non esiste");
<<<<<<< HEAD
        
        $factory_class = $this->getFactoryClass($model_class);
        
        if (class_exists($factory_class)) {
            /** @var Factory $factory */
            $factory = $factory_class::new();
            
            // Verifichiamo che il risultato sia effettivamente un'istanza di Factory
            Assert::isInstanceOf($factory, Factory::class, 
                "La classe $factory_class::new() non ha restituito un'istanza di Factory");
                
            return $factory;
<<<<<<< HEAD
=======
=======
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function execute(string $model_class)
    {
        $factory_class = $this->getFactoryClass($model_class);

        if (class_exists($factory_class)) {
            return $factory_class::new();
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======

        $factory_class = $this->getFactoryClass($model_class);

        if (class_exists($factory_class)) {
            /** @var Factory $factory */
            $factory = $factory_class::new();

            // Verifichiamo che il risultato sia effettivamente un'istanza di Factory
            Assert::isInstanceOf($factory, Factory::class,
                "La classe $factory_class::new() non ha restituito un'istanza di Factory");

            return $factory;
>>>>>>> 4ab3760 (.)
        }

        $this->createFactory($model_class);

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
        // Lancia un'eccezione con informazioni specifiche
        throw new \Exception(sprintf(
            'Generating Factory [%s] press [F5] to refresh page [%d][%s]',
            $factory_class,
            __LINE__,
            class_basename($this)
        ));
    }

    /**
     * Get the factory class name for a model class.
     *
     * @param string $model_class The model class name
     * @return string The fully qualified factory class name
     */
    public function getFactoryClass(string $model_class): string
    {
        Assert::stringNotEmpty($model_class, 'Model class non può essere vuota');
<<<<<<< HEAD
        
        $model_name = class_basename($model_class);
        
        // Costruiamo il nome della classe factory seguendo le convenzioni di Laravel
<<<<<<< HEAD
=======
=======
        throw new \Exception('Generating Factory ['.$factory_class.'] press [F5] to refresh page ['.__LINE__.']['.class_basename($this).']');
    }
=======
>>>>>>> 4ab3760 (.)

        $model_name = class_basename($model_class);
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======

        // Costruiamo il nome della classe factory seguendo le convenzioni di Laravel
>>>>>>> 4ab3760 (.)
        $factory_class = Str::of($model_class)
            ->before('\Models\\')
            ->append('\Database\Factories\\')
            ->append($model_name)
            ->append('Factory')
            ->toString();
<<<<<<< HEAD
<<<<<<< HEAD
            
        Assert::stringNotEmpty($factory_class, 'Factory class non può essere vuota');
        
=======
<<<<<<< HEAD
            
        Assert::stringNotEmpty($factory_class, 'Factory class non può essere vuota');
        
=======

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======

        Assert::stringNotEmpty($factory_class, 'Factory class non può essere vuota');

>>>>>>> 4ab3760 (.)
        return $factory_class;
    }

    /**
     * Create a factory for the given model class.
     *
     * @param string $model_class The class name of the model to create the factory for
     *
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    public function createFactory(string $model_class): void
    {
        Assert::stringNotEmpty($model_class, 'Model class non può essere vuota');
        Assert::classExists($model_class, "La classe del modello $model_class non esiste");

        $model_name = class_basename($model_class);

        // Estraiamo il nome del modulo dal namespace della classe
        $module_parts = Str::of($model_class)->between('Modules\\', '\Models\\');

        if ($module_parts === '') {
            throw new \InvalidArgumentException(
                "Impossibile determinare il nome del modulo dal namespace $model_class"
            );
        }

        $module_name = is_string($module_parts) ? $module_parts : (string) $module_parts;

        // Eseguiamo il comando Artisan per generare la factory
        $artisan_cmd = 'module:make-factory';
        $artisan_params = ['name' => $model_name, 'module' => $module_name];
<<<<<<< HEAD
        
        Artisan::call($artisan_cmd, $artisan_params);
<<<<<<< HEAD
=======
=======
    public function createFactory(string $model_class)
    {
        /*
        $model = app($model_class);
        $dataFromTable = app(GetPropertiesFromTableByModelAction::class)->execute($model);
        $dataFromMethods = app(GetPropertiesFromMethodsByModelAction::class)->execute($model);
=======
>>>>>>> 4ab3760 (.)

        Artisan::call($artisan_cmd, $artisan_params);
<<<<<<< HEAD

        /*
        dddx([
            'message' => 'WIP',
            'model_name' => $model_class,
        ]);
        */
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> 4ab3760 (.)
    }
}
