<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    }
}
