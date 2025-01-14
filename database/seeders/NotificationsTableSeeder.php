<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample notification data
        DB::table('notifications')->insert([
            [
                'id' => (string) Str::uuid(), // Generating UUID
                'type' => 'App\\Notifications\\Booking', // Example notification type
                'notifiable_type' => 'App\\Models\\User', // Notifiable model type
                'notifiable_id' => 1, // Example user ID (adjust as needed)
                'data' => json_encode([
                    'message' => 'Welcome to the site!',
                    'url' => 'https://example.com/dashboard',
                ]), // Example notification data (usually in JSON format)
                'read_at' => null, // Mark as unread
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'type' => 'App\\Notifications\\Booking', // Example notification type
                'notifiable_type' => 'App\\Models\\User',
                'notifiable_id' => 1, // Example user ID
                'data' => json_encode([
                    'message' => 'Your order has been shipped!',
                    'order_id' => 12345,
                ]),
                'read_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
