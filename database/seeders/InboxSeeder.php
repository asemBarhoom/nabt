<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inboxes')->insert([
            [
                'name' => 'أحمد محمد',
                'phone' => '123456789',
                'user_id' => 1,
                'subject' => 'استفسار حول الخدمة',
                'message' => 'أريد معرفة المزيد عن خدماتكم.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة علي',
                'phone' => '987654321',
                'user_id' => 1,
                'subject' => 'اقتراح تحسين',
                'message' => 'أقترح إضافة ميزة جديدة للمنتج.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمد صالح',
                'phone' => '555666777',
                'user_id' => 1,
                'subject' => 'شكوى',
                'message' => 'واجهت مشكلة أثناء استخدام الموقع.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
