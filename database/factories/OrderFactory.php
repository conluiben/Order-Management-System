<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => fake()->name(),
            'order_description' => fake()->realText(100),
            'deadline' => fake()->dateTimeBetween('-1 day','1 month'),
            'amount_total' => (fake()->randomFloat(0,5,48000)/4)
        ];
    }
}
