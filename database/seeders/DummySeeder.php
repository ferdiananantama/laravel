<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $user = User::factory()->create([
                'name' => 'Dummy User',
                'email' => 'dummy@example.local',
                'password' => 'password',
            ]);

            $events = Event::factory(20)->createQuietly();

            $events->each(function (Event $event) {
                $tickets = Ticket::factory(fake()->numberBetween(3, 10))->make(['event_id' => $event->id]);
                $event->tickets()->saveManyQuietly($tickets);
            });

            $orderStatus = ['success', 'pending', 'failed'];
            $eventsToOrder = $events->take(count($orderStatus))->values();
            foreach ($eventsToOrder as $i => $event) {
                $status = $orderStatus[$i];
                $order = Order::factory()->{$status}()->create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                ]);
                $order->tickets()->sync($event->tickets->mapWithKeys(fn (Ticket $ticket) => [
                    $ticket->id => ['price' => $ticket->price, 'quantity' => fake()->numberBetween(1, 3)],
                ]));
            }

            Banner::factory(8)->create();
        });
    }
}
