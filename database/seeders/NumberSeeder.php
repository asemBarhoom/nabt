<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('numbers')->insert([
                 [
                     'title' => json_encode([
                                                'en' => 'Total Bookings Provided',
                                                'ar' => 'إجمالي الحجوزات التي تم تقديمها'
                                            ]),
                     'image' => 'user.svg',
                     'status' => true,
                     'value' => 987,
                     'created_at' => now(),
                     'updated_at' => now(),
                 ],
                 [
                     'title' => json_encode([
                                                'en' => 'Average Customer Rating: 4.5 Stars',
                                                'ar' => 'متوسط تقييم العملاء: 4.5 نجوم'
                                            ]),
                     'image' => 'solar_ticket-bold-duotone.svg',
                     'status' => true,
                     'value' => 478,
                     'created_at' => now(),
                     'updated_at' => now(),
                 ],
                 [
                     'title' => json_encode([
                                                'en' => 'Number of Customers Served',
                                                'ar' => 'عدد العملاء الذين تم خدمتهم'
                                            ]),
                     'image' => 'star.svg',
                     'status' => true,
                     'value' => 565,
                     'created_at' => now(),
                     'updated_at' => now(),
                 ],
             ]);
    }
}
