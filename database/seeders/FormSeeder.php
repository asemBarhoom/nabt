<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // إضافة بيانات افتراضية إلى جدول forms
        DB::table('forms')->insert([
                                       [
                                           'body' => 'This is the body of form 1',
                                           'user_id' => 1, // افترض أن المستخدم ذو id=1 موجود
                                           'status' => 'pending',
                                           'created_at' => now(),
                                           'updated_at' => now(),
                                       ],
                                       [
                                           'body' => 'This is the body of form 2',
                                           'user_id' => 2, // افترض أن المستخدم ذو id=2 موجود
                                           'status' => 'approved',
                                           'created_at' => now(),
                                           'updated_at' => now(),
                                       ],
                                       [
                                           'body' => 'This is the body of form 3',
                                           'user_id' => 3, // افترض أن المستخدم ذو id=3 موجود
                                           'status' => 'rejected',
                                           'created_at' => now(),
                                           'updated_at' => now(),
                                       ],
                                   ]);
    }
}
