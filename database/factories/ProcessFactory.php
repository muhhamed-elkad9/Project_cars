<?php

namespace Database\Factories;

use App\Models\Counter;
use App\Models\product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'processes_date' => $this->faker->date('Y-m-d'),
            'counter_value' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->numberBetween(0, 1000),
            'supplier_id' => Supplier::inRandomOrder()->value('id'),
            'product_id' => product::inRandomOrder()->value('id'),
        ];
    }
}
