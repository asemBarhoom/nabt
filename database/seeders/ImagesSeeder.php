<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\Image;
use App\Models\Landmark;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for polymorphic images
        DB::table('images')->insert([
            [
                'imageable_id' => 1, // ID of the related model
                'imageable_type' => 'App\Models\Destination', // Related model's class
                'image_path' => 'images/posts/image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imageable_id' => 2, // ID of the related model
                'imageable_type' => 'App\Models\Destination', // Related model's class
                'image_path' => 'images/users/profile1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imageable_id' => 3, // ID of the related model
                'imageable_type' => 'App\Models\Destination', // Related model's class
                'image_path' => 'images/products/product1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        for ($i = 0; $i < 10; $i++) {
            Image::create([
                'imageable_id' => 1, // ID of the related model
                'imageable_type' => 'App\Models\Landmark', // Related model's class
                'image_path' => 'post1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        for ($i = 0; $i < 10; $i++) {
            Image::create([
                'imageable_id' => 1, // ID of the related model
                'imageable_type' => 'App\Models\Accommodation', // Related model's class
                'image_path' => 'post1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
