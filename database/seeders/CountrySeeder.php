<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Destination;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gccCountries = [
            [
                'id' => 1,
                'name' => ['en' => 'Bahrain', 'ar' => 'البحرين'],
                'alpha_3' => 'BHR',
                'flag' => 'flags/bahrain.png', // Replace with the actual URL or path
                'prefix' => '+973',
            ],
            [
                'id' => 2,
                'name' => ['en' => 'Kuwait', 'ar' => 'الكويت'],
                'alpha_3' => 'KWT',
                'flag' => 'flags/kuwait.png', // Replace with the actual URL or path
                'prefix' => '+965',
            ],
            [
                'id' => 3,
                'name' => ['en' => 'Oman', 'ar' => 'عمان'],
                'alpha_3' => 'OMN',
                'flag' => 'flags/oman.png', // Replace with the actual URL or path
                'prefix' => '+968',
            ],
            [
                'id' => 4,
                'name' => ['en' => 'Qatar', 'ar' => 'قطر'],
                'alpha_3' => 'QAT',
                'flag' => 'flags/qatar.png', // Replace with the actual URL or path
                'prefix' => '+974',
            ],
            [
                'id' => 5,
                'name' => ['en' => 'Saudi Arabia', 'ar' => 'المملكة العربية السعودية'],
                'alpha_3' => 'SAU',
                'flag' => 'flags/saudi_arabia.png', // Replace with the actual URL or path
                'prefix' => '+966',
            ],
            [
                'id' => 6,
                'name' => ['en' => 'United Arab Emirates', 'ar' => 'الإمارات العربية المتحدة'],
                'alpha_3' => 'ARE',
                'flag' => 'flags/uae.png', // Replace with the actual URL or path
                'prefix' => '+971',
            ],
        ];


        collect($gccCountries)->map(function ($item) {
            Country::query()->create($item);
        });

        DB::table('users')->insert([
                                       'name' => "asem",
                                       'country_id' => "5",
                                       'prefix' => "+966",
                                       'phone' => "0595341359",
                                       'age' => "24",
                                       'address' => "gaza stripe",
                                       'job' => "Software Engineer",
                                       'image' => 'avatar.png',
                                       'dob' => Carbon::now()->format('Y-m-d'), // Corrected date format
                                       'email' => "atbarhoom@hotmail.com",
                                       'email_verified_at' => now(),
                                       'phone_verified_at' => now(),
                                       'password' => bcrypt('password'), // Use a default password or generate securely
                                       'remember_token' => Str::random(10),
                                       'created_at' => now(),
                                       'updated_at' => now(),
                                   ]);
    }
}
