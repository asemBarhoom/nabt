<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\Favorite;
use App\Models\Tourevent;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $destinations = Destination::inRandomOrder()->get();
            $tourevents = Tourevent::inRandomOrder()->get();
            $bookings = Booking::inRandomOrder()->get();
            $accommodations = Accommodation::inRandomOrder()->get();

            foreach ($destinations as $destination) {
                Favorite::query()->create([
                    'user_id' => $user->id,
                    'favorable_id' => $destination->id,
                    'favorable_type' => Destination::class,
                ]);
            }

            foreach ($tourevents as $tourevent) {
                Favorite::query()->create([
                    'user_id' => $user->id,
                    'favorable_id' => $tourevent->id,
                    'favorable_type' => Tourevent::class,
                ]);
            }

            foreach ($bookings as $booking) {
                Favorite::query()->create([
                    'user_id' => $user->id,
                    'favorable_id' => $booking->id,
                    'favorable_type' => Booking::class,
                ]);
            }

            foreach ($accommodations as $accommodation) {
                Favorite::query()->create([
                    'user_id' => $user->id,
                    'favorable_id' => $accommodation->id,
                    'favorable_type' => Accommodation::class,
                ]);
            }
        }
    }
}
