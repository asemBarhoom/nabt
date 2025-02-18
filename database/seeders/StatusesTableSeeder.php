<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure the tables exist before seeding
        if (!Schema::hasTable('bookings') || !Schema::hasTable('statuses')) {
            return;
        }

        $statuses = [
            'pending', 'confirmed', 'in_progress', 'cancellation_requested', 'cancellation_rejected',
            'completed', 'cancelled'
        ];

        // Loop through all users and assign bookings
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 6; $i++) {
                $bookingId = Booking::query()->where('user_id',$user->id)->inRandomOrder()->first()->id;

                // Assign random statuses ensuring each category has at least two bookings
                $status = $statuses[array_rand($statuses)];
                DB::table('statuses')->insert([
                                                  'status' => $status,
                                                  'user_id' => $user->id,
                                                  'statusable_id' => $bookingId,
                                                  'statusable_type' => Booking::class,
                                                  'color' => Booking::STATUS_COLORS[$status] ?? '#000',
                                                  'created_at' => now(),
                                                  'updated_at' => now(),
                                              ]);
            }
        }

        // Fetch tickets to seed statuses for
        $tickets = Ticket::query()->get(); // Adjust the number as needed

        foreach ($tickets as $ticket) {
            // Seed statuses based on the Ticket's STATUS_FLOW
            foreach (Ticket::STATUS_FLOW as $index => $status) {
                DB::table('statuses')->insert([
                    'status' => $status,
                    'user_id' => $ticket->user_id, // Assuming Ticket has a user_id
                    'statusable_id' => $ticket->id,
                    'statusable_type' => Ticket::class,
                    'color' => Ticket::STATUS_COLORS[$status],
                    'created_at' => now()->addMinutes($index * 5), // Stagger timestamps for realism
                    'updated_at' => now()->addMinutes($index * 5),
                ]);
            }
        }
    }
}
