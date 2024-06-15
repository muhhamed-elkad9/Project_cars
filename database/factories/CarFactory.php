<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'car_name' => $this->faker->name(),
            // 'company_name_made' => $this->faker->name(),
            // 'car_year_buy' => $this->faker->date('Y-m-d'),
            // 'car_number' => $this->faker->randomNumber(5, true),
            // 'car_number_serial' => $this->faker->regexify('[A-Z]{3}-[0-9]{4}'),
            // 'car_year_made' => $this->faker->numberBetween(1990, date('Y')),
            // 'car_age' => $this->faker->numberBetween(0, 15),
            // 'traveled_distance' => $this->faker->randomFloat(1, 0, 15),
            // 'car_value_buy' => $this->faker->randomFloat(2, 5000, 50000),
            // 'current_value' => $this->faker->randomFloat(2, 5000, 50000),
        ];
    }
}
