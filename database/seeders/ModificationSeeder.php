<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Modification;
use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;


class ModificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            // Fetch all bookings, ensuring the collection is not empty
            $bookings = Booking::query()->with('user')->get();

            if ($bookings->isEmpty()) {
                throw new Exception("No bookings found. Seeding modifications aborted.");
            }

            $faker = Faker::create();
            $modifications = [];

            foreach (range(1, 15) as $index) {
                $randomBooking = $bookings->random();

                // Ensure the booking has a user before proceeding
                if (!$randomBooking->user) {
                    continue; // Skip if no associated user
                }

                $modifications[] = [
                    'booking_id' => $randomBooking->id,
                    'user_id' => $randomBooking->user->id,
                    'body' => $faker->sentence(10),
                    'admin_response' => $faker->optional()->sentence(6),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Bulk insert modifications for better performance
            if (!empty($modifications)) {
                Modification::insert($modifications);
            }

            DB::commit();
            Log::info("Database seeding completed successfully.");

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Database seeding failed: " . $e->getMessage(), [
                'exception' => $e
            ]);
        }
    }
}
