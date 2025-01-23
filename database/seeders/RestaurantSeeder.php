<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userIds = DB::table('users')->pluck('id'); // Retrieve user IDs

        $data = [
            [
                'restaurant_name' => 'مطعم المذاق العربي',
                'desired_food' => 'المأكولات التقليدية',
                'reservation_time' => '2025-01-22 19:00:00',
                'user_id' => $userIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_name' => 'سما العلا',
                'desired_food' => 'مأكولات بحرية',
                'reservation_time' => '2025-01-23 20:30:00',
                'user_id' => $userIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_name' => 'واحة النخيل',
                'desired_food' => 'مأكولات نباتية',
                'reservation_time' => '2025-01-24 18:00:00',
                'user_id' => $userIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_name' => 'الجبل الذهبي',
                'desired_food' => 'مشويات',
                'reservation_time' => '2025-01-25 20:00:00',
                'user_id' => $userIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_name' => 'أطايب العلا',
                'desired_food' => 'أطباق عالمية',
                'reservation_time' => '2025-01-26 21:00:00',
                'user_id' => $userIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('restaurants')->insert($data);
        $this->command->info('Restaurants table seeded successfully!');

    }
}
