<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => "asem",
            'phone' => "0595341359",
            'age' => "24",
            'address' => "gaza stripe",
            'job' => "Software Engineer",
            'image' => $faker->imageUrl(640, 480, 'people'),
            'dob' => $faker->date('Y-m-d'), // Corrected date format
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'password' => bcrypt('password'), // Use a default password or generate securely
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create 10 users
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'phone' => $faker->unique()->phoneNumber,
                'age' => $faker->numberBetween(18, 65),
                'address' => $faker->address,
                'job' => $faker->word,
                'image' => $faker->imageUrl(640, 480, 'people'),
                'dob' => $faker->date('Y-m-d'), // Corrected date format
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'password' => bcrypt('password'), // Use a default password or generate securely
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
