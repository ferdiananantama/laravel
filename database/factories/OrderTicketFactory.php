<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fn () => Order::factory()->create()->id,
            'ticket_id' => fn () => Ticket::factory()->create()->id,
            'price' => fake()->numberBetween(100_000, 1_000_000),
            'quantity' => fake()->numberBetween(1, 5),
        ];
    }
}
