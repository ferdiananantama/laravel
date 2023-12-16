<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->sentence(6)),
            'date' => fake()->date(max: '2030-12-30'),
            'time_start' => fake()->time(),
            'time_end' => fake()->randomElement([null, fake()->time(max: '23:00:00')]),
            'location' => sprintf("%s, %s", fake()->city(), fake()->country()),
            'image_path' => fake()->imageUrl(width: 1280, height: 720),
            'slug' => fake()->slug(),
            'about' => fake()->text(),
            'lineup' => fake()->text(),
            'about_ticket' => fake()->text(),
            'ticket_redemption' => fake()->text(),
            'is_recommended' => fake()->boolean(),
        ];
    }
}
