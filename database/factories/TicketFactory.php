<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => fn () => Event::factory()->create()->id,
            'name' => ucwords(fake()->word()),
            'price' => fake()->numberBetween(100_000, 1_000_000),
            'stock' => fake()->numberBetween(0, 10),
        ];
    }
}
