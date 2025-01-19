<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch categories, bookings, and users
        $bookings = Booking::all();



// Create 10 sample tickets
        foreach ($bookings as $booking) {
            $tiket_id = 'TICKET-' . Str::random(8);
            Ticket::create([
                'ticket_id' => $tiket_id,
                'category_id' =>  41,
                'booking_id' => $booking->id,
                'user_id' => $booking->user_id,
                'body' => 'This is a sample ticket body description for ticket ' . $tiket_id, // Sample ticket body
                'attachment_path' => null, // You can provide a path if you need to associate a file
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
