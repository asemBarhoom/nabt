<?php

namespace Database\Seeders;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $users = User::query()->get();
        foreach ($users as $user) {
            $bookings = [
                [
                    'trip_duration' => ['en' => 'Three days and two nights', 'ar' => 'ثلاثة أيام وليلتين'],
                    'user_id' => $user->id,
                    'destination_id' => 1,
                    'accommodation_id' => 1,
                    'booking_date' => Carbon::parse('2024-12-12'),
                    'arrival_time' => '10:30:00',
                    'num_adults' => 2,
                    'num_children' => 1,
                    'num_rooms' => 2,
                    'room_type' => 'single',
                    'num_meals' => 2,
                    'meal_notes' => 'I am a vegetarian, no meat please.',
                    'trip_type' => 'TOURIST',
                    'food_allergies' => false,
                    'vehicle_type' => 'CAR',
                    'vehicle_description' => 'Family vehicle that accommodates 6 passengers',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'trip_duration' => ['en' => 'Three days and two nights', 'ar' => 'ثلاثة أيام وليلتين'],
                    'user_id' => $user->id,
                    'destination_id' => 2,
                    'accommodation_id' => 2,
                    'booking_date' => Carbon::parse('2024-12-15'),
                    'arrival_time' => '14:00:00',
                    'num_adults' => 3,
                    'num_children' => 2,
                    'num_rooms' => 3,
                    'room_type' => 'double',
                    'num_meals' => 3,
                    'meal_notes' => 'No specific dietary requirements.',
                    'trip_type' => 'TOURIST',
                    'food_allergies' => false,
                    'vehicle_type' => 'CAR',
                    'vehicle_description' => 'Sedan vehicle',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'trip_duration' => ['en' => 'Three days and two nights', 'ar' => 'ثلاثة أيام وليلتين'],
                    'user_id' => $user->id,
                    'destination_id' => 3,
                    'accommodation_id' => 3,
                    'booking_date' => Carbon::parse('2024-12-20'),
                    'arrival_time' => '08:00:00',
                    'num_adults' => 1,
                    'num_children' => 0,
                    'num_rooms' => 1,
                    'room_type' => 'suite',
                    'num_meals' => 1,
                    'meal_notes' => 'Gluten-free meal required.',
                    'trip_type' => 'TOURIST',
                    'food_allergies' => true,
                    'vehicle_type' => 'CAR',
                    'vehicle_description' => 'SUV vehicle',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ];

            collect($bookings)->map(function ($item) {
                Booking::query()->create($item);
            });
        }
    }
}
