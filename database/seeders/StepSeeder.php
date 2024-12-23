<?php

namespace Database\Seeders;

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
                'name' => json_encode(['en' => 'Step 1', 'ar' => 'الخطوة الأولى']),
                'title' => json_encode(['en' => 'Choose the date and number of people', 'ar' => 'اختيار التاريخ وعدد الأشخاص']),
                'body' => json_encode(['en' => 'Select the preferred date and specify the number of travelers.', 'ar' => 'اختر التاريخ المفضل وحدد عدد المسافرين.']),
                'order' => 1,
                'status' => true,
            ],
            [
                'name' => json_encode(['en' => 'Step 2', 'ar' => 'الخطوة الثانية']),
                'title' => json_encode(['en' => 'Choose the destination', 'ar' => 'اختيار الوجهة السياحية']),
                'body' => json_encode(['en' => 'Pick your desired travel destination.', 'ar' => 'اختر وجهة السفر المفضلة لديك.']),
                'order' => 2,
                'status' => true,
            ],
            [
                'name' => json_encode(['en' => 'Step 3', 'ar' => 'الخطوة الثالثة']),
                'title' => json_encode(['en' => 'Choose accommodation', 'ar' => 'اختيار مكان الإقامة']),
                'body' => json_encode(['en' => 'Select your accommodation type and location.', 'ar' => 'اختر نوع ومكان الإقامة الخاص بك.']),
                'order' => 3,
                'status' => true,
            ],
            [
                'name' => json_encode(['en' => 'Step 4', 'ar' => 'الخطوة الرابعة']),
                'title' => json_encode(['en' => 'Select trip needs', 'ar' => 'اختيار احتياجات الرحلة']),
                'body' => json_encode(['en' => 'Choose additional services or requirements for your trip.', 'ar' => 'اختر الخدمات الإضافية أو المتطلبات لرحلتك.']),
                'order' => 4,
                'status' => true,
            ],
            [
                'name' => json_encode(['en' => 'Step 5', 'ar' => 'الخطوة الخامسة']),
                'title' => json_encode(['en' => 'Pick activities', 'ar' => 'اختيار فعاليات الرحلة']),
                'body' => json_encode(['en' => 'Decide on the activities you’d like to include.', 'ar' => 'قرر الأنشطة التي ترغب في تضمينها.']),
                'order' => 5,
                'status' => true,
            ],
        ];

        DB::table('steps')->insert($steps);
    }
}
