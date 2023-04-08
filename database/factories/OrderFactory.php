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
        // $table->id('order_id');
        // $table->timestamps();
        // $table->string('status');
        // $table->float('total_price', 8, 2);
        // $table->unsignedBigInteger('customer_id');
        return [
            'created_at' => now(),
            'updated_at' => now(),
            'status' => 'shipped',
            'total_price' => fake()->numberBetween(1, 3000),
            'customer_id' => fake()->numberBetween(1, 10)
        ];
    }
}
