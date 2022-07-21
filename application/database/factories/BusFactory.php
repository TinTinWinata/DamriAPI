<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition()
    {
        $brandList = ['mercedes', 'fuso', 'scania'];
        $brand = $this->faker->randomElement($brandList);

        return [
            'plate_number' => $this->faker->text(5),
            'brand' => $brand,
            'seat' => $this->faker->randomDigit(),
            'price_per_day' => $this->faker->numberBetween(100000, 1000000),
        ];
    }
}
