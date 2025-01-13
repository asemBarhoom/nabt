<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CancellationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate 10 cancellation records
        foreach (range(1, 10) as $index) {
            $booking = \App\Models\Booking::inRandomOrder()->first()->id ?? null;
            DB::table('cancellations')->insert([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'user_id' => isset($booking)?@$booking->user_id :null, // Random booking id or null
                'booking_id' => \App\Models\Booking::inRandomOrder()->first()->id ?? null, // Random booking id or null
                'category_id' => \App\Models\Category::query()
                        ->where('categoriable_type','App\Models\Cancellation')
                        ->inRandomOrder()
                        ->first()->id ?? null, // Random category id or null
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
