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
            ['id' => 1, 'name' => ['en' => 'Bahrain', 'ar' => 'البحرين'], 'alpha_3' => 'BHR'],
            ['id' => 2, 'name' => ['en' => 'Kuwait', 'ar' => 'الكويت'], 'alpha_3' => 'KWT'],
            ['id' => 3, 'name' => ['en' => 'Oman', 'ar' => 'عمان'], 'alpha_3' => 'OMN'],
            ['id' => 4, 'name' => ['en' => 'Qatar', 'ar' => 'قطر'], 'alpha_3' => 'QAT'],
            ['id' => 5, 'name' => ['en' => 'Saudi Arabia', 'ar' => 'المملكة العربية السعودية'], 'alpha_3' => 'SAU'],
            ['id' => 6, 'name' => ['en' => 'United Arab Emirates', 'ar' => 'الإمارات العربية المتحدة'], 'alpha_3' => 'ARE'],
        ];

        collect($gccCountries)->map(function ($item) {
            Country::query()->create($item);
        });
    }
}
