<?php

namespace Database\Factories;

use App\Models\Cake;
use App\Models\Interested;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterestedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Interested::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "email" => $this->faker->email,
            "cake_id" => Cake::factory()
        ];
    }
}
