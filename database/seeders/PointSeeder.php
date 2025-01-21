<?php

namespace Database\Seeders;

use App\Models\Point;
use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all users from the database
        $users = User::all();

        // Iterate over each user
        foreach ($users as $user) {
            // Generate sample points data
            $pointsData = [
                [
                    'user_id' => $user->id,
                    'description' => ['ar' => 'بونص الترحيب', 'en' => 'Welcome Bonus'],
                    'points_earned' => 100,
                    'total_points' => 100,
                    'points_type' => 'welcome',
                    'status' => 'approved',
                    'source' => 'registration',
                    'is_adjustment' => false,
                    'notes' => ['en' => 'Welcome bonus for new registration', 'ar' => 'مكافأة ترحيب للتسجيل الجديد'], // Multi-language notes
                    'redeemable' => true,
                ],
                [
                    'user_id' => $user->id,
                    'description' => ['en' =>'First Purchase', 'ar' =>'الشراء الأول'],
                    'points_earned' => 50,
                    'total_points' => 150,
                    'points_type' => 'purchase',
                    'status' => 'approved',
                    'source' => 'purchase',
                    'is_adjustment' => false,
                    'notes' => ['en' =>'Points earned for the first purchase', 'ar' =>'نقاط مُكتسبة عن أول عملية شراء'],
                    'redeemable' => true,
                ],
            ];

            collect($pointsData)->map(function ($item) {
                Point::query()->create($item);
            });

        }
        }
    }
