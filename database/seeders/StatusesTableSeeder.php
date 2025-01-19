<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch bookings to seed statuses for
        $bookings = Booking::query()->get(); // Adjust the number as needed

        foreach ($bookings as $booking) {
            // Seed statuses based on the Booking's STATUS_FLOW
            foreach (Booking::STATUS_FLOW as $index => $status) {
                DB::table('statuses')->insert([
                    'status' => $status,
                    'user_id' => $booking->user_id, // Assuming Booking has a user_id
                    'statusable_id' => $booking->id,
                    'statusable_type' => Booking::class,
                    'color' => Booking::STATUS_COLORS[$status],
                    'created_at' => now()->addMinutes($index * 5), // Stagger timestamps for realism
                    'updated_at' => now()->addMinutes($index * 5),
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
