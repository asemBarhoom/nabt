<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SystemAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_admins')->insert([
            'fcm_token' => 'your_fcm_token',
            'name' => 'admin',
            'email' => 'admin@example.com',
            'mobile' => '1234567890',
            'password' => Hash::make('12345678'),
            'status' => 1,
            'avatar' => 'avatar.png',
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
