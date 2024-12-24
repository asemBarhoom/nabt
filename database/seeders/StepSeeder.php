<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = [
            [
                'name' => ['en' => 'Step 1', 'ar' => 'الخطوة الأولى'],
                'title' => ['en' => 'Choose the date and number of people', 'ar' => 'اختيار التاريخ وعدد الأشخاص'],
                'body' => ['en' => 'Select the preferred date and specify the number of travelers.', 'ar' => 'اختر التاريخ المفضل وحدد عدد المسافرين.'],
                'order' => 1,
                'status' => true,
            ],
            [
                'name' => ['en' => 'Step 2', 'ar' => 'الخطوة الثانية'],
                'title' => ['en' => 'Choose the destination', 'ar' => 'اختيار الوجهة السياحية'],
                'body' => ['en' => 'Pick your desired travel destination.', 'ar' => 'اختر وجهة السفر المفضلة لديك.'],
                'order' => 2,
                'status' => true,
            ],
            [
                'name' => ['en' => 'Step 3', 'ar' => 'الخطوة الثالثة'],
                'title' => ['en' => 'Choose accommodation', 'ar' => 'اختيار مكان الإقامة'],
                'body' => ['en' => 'Select your accommodation type and location.', 'ar' => 'اختر نوع ومكان الإقامة الخاص بك.'],
                'order' => 3,
                'status' => true,
            ],
            [
                'name' => ['en' => 'Step 4', 'ar' => 'الخطوة الرابعة'],
                'title' => ['en' => 'Select trip needs', 'ar' => 'اختيار احتياجات الرحلة'],
                'body' => ['en' => 'Choose additional services or requirements for your trip.', 'ar' => 'اختر الخدمات الإضافية أو المتطلبات لرحلتك.'],
                'order' => 4,
                'status' => true,
            ],
            [
                'name' => ['en' => 'Step 5', 'ar' => 'الخطوة الخامسة'],
                'title' => ['en' => 'Pick activities', 'ar' => 'اختيار فعاليات الرحلة'],
                'body' => ['en' => 'Decide on the activities you’d like to include.', 'ar' => 'قرر الأنشطة التي ترغب في تضمينها.'],
                'order' => 5,
                'status' => true,
            ],
        ];

        collect($steps)->map(function ($item) {
            Step::query()->create($item);
        });
    }
}
