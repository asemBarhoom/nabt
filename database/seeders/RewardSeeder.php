<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'points_balance' => 100.00,
                'money_balance' => 50.00,
                'status' => true,
            ],
            [
                'points_balance' => 150.00,
                'money_balance' => 75.00,
                'status' => true,
            ],
            [
                'points_balance' => 200.00,
                'money_balance' => 100.00,
                'status' => true,
            ],
            [
                'points_balance' => 50.00,
                'money_balance' => 25.00,
                'status' => false,
            ],
            [
                'points_balance' => 0.00,
                'money_balance' => 0.00,
                'status' => true,
            ],
            [
                'points_balance' => 300.00,
                'money_balance' => 150.00,
                'status' => false,
            ],
            [
                'points_balance' => 120.00,
                'money_balance' => 60.00,
                'status' => true,
            ],
            [
                'points_balance' => 80.00,
                'money_balance' => 40.00,
                'status' => true,
            ],
            [
                'points_balance' => 250.00,
                'money_balance' => 125.00,
                'status' => false,
            ],
            [
                'points_balance' => 180.00,
                'money_balance' => 90.00,
                'status' => true,
            ],
        ];

        // Insert the data into the database
        DB::table('rewards')->insert($data);
    }
}
