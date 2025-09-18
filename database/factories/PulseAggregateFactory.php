<?php

declare(strict_types=1);

namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

<<<<<<< HEAD
class PulseAggregateFactory extends Factory
=======
class PulseAggregateFactory extends Factory<PulseAggregate>
>>>>>>> 04664ea (.)
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Xot\Models\PulseAggregate::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
        ];
    }
}
