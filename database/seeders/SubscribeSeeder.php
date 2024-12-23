<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribes')->insert([
            [
                'email' => 'user1@example.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user2@example.com',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user3@example.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user4@example.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user5@example.com',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user6@example.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user7@example.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user8@example.com',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user9@example.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user10@example.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
}
}
