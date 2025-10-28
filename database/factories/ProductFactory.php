<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name(),
            'product_date_day' => $this->faker->numberBetween(1, 20),
            'product_date_distance' => $this->faker->numberBetween(1, 20),
        ];
    }
}
