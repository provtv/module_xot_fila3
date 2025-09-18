<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

<<<<<<< HEAD
class PulseValueFactory extends Factory
=======
class PulseValueFactory extends Factory<PulseValue>
>>>>>>> 04664ea (.)
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Xot\Models\PulseValue::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
        ];
    }
}
