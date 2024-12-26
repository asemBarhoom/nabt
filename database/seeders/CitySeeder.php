<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // City data for each GCC country
        $cities = [
            // Bahrain
            ['name' => ['en' => 'Manama', 'ar' => 'المنامة'], 'alpha_3' => 'MAN', 'country_id' => 1],
            ['name' => ['en' => 'Riffa', 'ar' => 'الرفاع'], 'alpha_3' => 'RIF', 'country_id' => 1],
            ['name' => ['en' => 'Muharraq', 'ar' => 'المحرّق'], 'alpha_3' => 'MUH', 'country_id' => 1],
            ['name' => ['en' => 'Aali', 'ar' => 'عالِي'], 'alpha_3' => 'AAL', 'country_id' => 1],
            ['name' => ['en' => 'Sitra', 'ar' => 'سترة'], 'alpha_3' => 'SIT', 'country_id' => 1],

            // Kuwait
            ['name' => ['en' => 'Kuwait City', 'ar' => 'مدينة الكويت'], 'alpha_3' => 'KWC', 'country_id' => 2],
            ['name' => ['en' => 'Hawally', 'ar' => 'حولّي'], 'alpha_3' => 'HAW', 'country_id' => 2],
            ['name' => ['en' => 'Salmiya', 'ar' => 'السالمية'], 'alpha_3' => 'SAL', 'country_id' => 2],
            ['name' => ['en' => 'Farwaniya', 'ar' => 'الفروانية'], 'alpha_3' => 'FAR', 'country_id' => 2],
            ['name' => ['en' => 'Mubarak Al Kabeer', 'ar' => 'مبارك الكبير'], 'alpha_3' => 'MUK', 'country_id' => 2],

            // Oman
            ['name' => ['en' => 'Muscat', 'ar' => 'مسقط'], 'alpha_3' => 'MSC', 'country_id' => 3],
            ['name' => ['en' => 'Salalah', 'ar' => 'صلالة'], 'alpha_3' => 'SAL', 'country_id' => 3],
            ['name' => ['en' => 'Nizwa', 'ar' => 'نِزوى'], 'alpha_3' => 'NIZ', 'country_id' => 3],
            ['name' => ['en' => 'Sohar', 'ar' => 'صحار'], 'alpha_3' => 'SOH', 'country_id' => 3],
            ['name' => ['en' => 'Ibra', 'ar' => 'إبراء'], 'alpha_3' => 'IBR', 'country_id' => 3],

            // Qatar
            ['name' => ['en' => 'Doha', 'ar' => 'الدوحة'], 'alpha_3' => 'DOH', 'country_id' => 4],
            ['name' => ['en' => 'Al Rayyan', 'ar' => 'الريان'], 'alpha_3' => 'RYN', 'country_id' => 4],
            ['name' => ['en' => 'Al Wakrah', 'ar' => 'الوكرة'], 'alpha_3' => 'WAK', 'country_id' => 4],
            ['name' => ['en' => 'Al Khor', 'ar' => 'الخور'], 'alpha_3' => 'KHO', 'country_id' => 4],
            ['name' => ['en' => 'Umm Salal', 'ar' => 'أم صلال'], 'alpha_3' => 'USS', 'country_id' => 4],

            // Saudi Arabia
            ['name' => ['en' => 'Riyadh', 'ar' => 'الرياض'], 'alpha_3' => 'RYD', 'country_id' => 5],
            ['name' => ['en' => 'Jeddah', 'ar' => 'جدة'], 'alpha_3' => 'JED', 'country_id' => 5],
            ['name' => ['en' => 'Mecca', 'ar' => 'مكة'], 'alpha_3' => 'MKK', 'country_id' => 5],
            ['name' => ['en' => 'Medina', 'ar' => 'المدينة المنورة'], 'alpha_3' => 'MED', 'country_id' => 5],
            ['name' => ['en' => 'Dammam', 'ar' => 'الدمام'], 'alpha_3' => 'DAM', 'country_id' => 5],
            ['name' => ['en' => 'Khobar', 'ar' => 'الخبر'], 'alpha_3' => 'KHO', 'country_id' => 5],
            ['name' => ['en' => 'Abha', 'ar' => 'أبها'], 'alpha_3' => 'ABH', 'country_id' => 5],
            ['name' => ['en' => 'Tabuk', 'ar' => 'تبوك'], 'alpha_3' => 'TAB', 'country_id' => 5],

            // United Arab Emirates
            ['name' => ['en' => 'Abu Dhabi', 'ar' => 'أبو ظبي'], 'alpha_3' => 'ADH', 'country_id' => 6],
            ['name' => ['en' => 'Dubai', 'ar' => 'دبي'], 'alpha_3' => 'DXB', 'country_id' => 6],
            ['name' => ['en' => 'Sharjah', 'ar' => 'الشارقة'], 'alpha_3' => 'SHA', 'country_id' => 6],
            ['name' => ['en' => 'Ajman', 'ar' => 'عجمان'], 'alpha_3' => 'AJM', 'country_id' => 6],
            ['name' => ['en' => 'Al Ain', 'ar' => 'العين'], 'alpha_3' => 'AIN', 'country_id' => 6],
            ['name' => ['en' => 'Ras Al Khaimah', 'ar' => 'رأس الخيمة'], 'alpha_3' => 'RAK', 'country_id' => 6],
            ['name' => ['en' => 'Fujairah', 'ar' => 'الفجيرة'], 'alpha_3' => 'FUJ', 'country_id' => 6],
        ];

        // Insert cities data into the 'cities' table
        collect($cities)->map(function ($item) {
            City::query()->create($item);
        });
    }
}
