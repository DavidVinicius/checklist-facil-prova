<?php

namespace Database\Factories;

use App\Models\Cake;
use App\Models\Interested;
use Illuminate\Database\Eloquent\Factories\Factory;

class CakeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cake::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "weight" => $this->faker->randomFloat(2, 0, 20),
            "quantity" => $this->faker->numberBetween(0, 10000),
            "value" => $this->faker->randomFloat(2, 10, 100000),            
        ];
    }
}
