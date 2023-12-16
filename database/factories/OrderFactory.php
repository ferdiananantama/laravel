<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
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
        $subtotal = fake()->numberBetween(100_000, 1_000_000);
        $serviceFee = fake()->numberBetween(1_000, 5_000);

        return [
            'user_id' => fn () => User::factory()->create()->id,
            'event_id' => fn () => Event::factory()->create()->id,
            'unique_code' => Order::uniqueCode(),
            'subtotal' => $subtotal,
            'service_fee' => $serviceFee,
            'grand_total' => $subtotal + $serviceFee,
            'pay_url' => fake()->url(),
        ];
    }

    public function success(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'success',
            'paid_at' => fake()->dateTime(),
            'expired_at' => null,
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
            'paid_at' => null,
            'expired_at' => now()->addYear(1),
        ]);
    }

    public function failed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'failed',
            'paid_at' => null,
            'expired_at' => fake()->dateTime(),
        ]);
    }
}
