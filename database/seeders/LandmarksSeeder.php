<?php

namespace Database\Seeders;

use App\Models\Landmark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LandmarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Landmark::create([
                'title' => ['ar' => $faker->unique()->city, 'en' => $faker->unique()->city],
                'body' => ['ar' => $faker->paragraph, 'en' => $faker->paragraph],
                'image' => 'https://source.unsplash.com/random/' . rand(100, 1000) . 'x' . rand(500, 800),
                'status' => true,
            ]);
        }
    }
}
