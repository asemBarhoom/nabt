<?php

namespace Database\Seeders;

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
            $destinations = Destination::inRandomOrder()->limit(rand(1, 5))->get();
            $tourevents = Tourevent::inRandomOrder()->limit(rand(1, 3))->get();

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
        }
    }
}
