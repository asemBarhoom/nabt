<?php

namespace Database\Seeders;

use App\Models\Booking;
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
                    'created_at' => now()->addMinutes($index * 5), // Stagger timestamps for realism
                    'updated_at' => now()->addMinutes($index * 5),
                ]);
            }
        }
    }
}
