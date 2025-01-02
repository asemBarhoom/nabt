<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinations = [

            [
                'name' => ['ar' => 'جبل القارة', 'en' => 'Jabal Al Qarah'],
                'body' => ['ar' => 'مكان طبيعي ساحر.', 'en' => 'A breathtaking natural site.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن جبل القارة باللغة العربية.</div>',
                    'en' => '<div>Details about Jabal Al Qarah in English.</div>'
                ],
                'slug' => 'jabal-al-qarah',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'الطقس بارد في الشتاء', 'en' => 'Cold weather in winter'],
                'amenities' => ['ar' => 'مرشدين سياحيين', 'en' => 'Tour guides'],
                'recommended_visit_season' => ['ar' => 'الصيف (يونيو - أغسطس)', 'en' => 'Summer (June - August)'],
                'category_id' => 3,
                'annual_visitors_min' => 30000,
                'annual_visitors_max' => 70000,
                'status' => true,
                'lat' => 26.60853000,
                'lng' => 37.92316000
            ],
            [
                'name' => ['ar' => 'وادي الديسة', 'en' => 'Wadi Al Disah'],
                'body' => ['ar' => 'وجهة طبيعية خلابة.', 'en' => 'A stunning natural destination.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن وادي الديسة باللغة العربية.</div>',
                    'en' => '<div>Details about Wadi Al Disah in English.</div>'
                ],
                'slug' => 'wadi-al-disah',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'الطقس معتدل في الشتاء', 'en' => 'Mild weather in winter'],
                'amenities' => ['ar' => 'أماكن للتخييم', 'en' => 'Camping areas'],
                'recommended_visit_season' => ['ar' => 'الربيع (مارس - مايو)', 'en' => 'Spring (March - May)'],
                'category_id' => 1,
                'annual_visitors_min' => 40000,
                'annual_visitors_max' => 90000,
                'status' => true,
                'lat' => 26.60853000,
                'lng' => 37.92316000
            ],
            [
                'name' => ['ar' => 'شاطئ أملج', 'en' => 'Umluj Beach'],
                'body' => ['ar' => 'شاطئ رائع للاستجمام.', 'en' => 'A great beach for relaxation.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن شاطئ أملج باللغة العربية.</div>',
                    'en' => '<div>Details about Umluj Beach in English.</div>'
                ],
                'slug' => 'umluj-beach',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'الطقس دافئ', 'en' => 'Warm weather'],
                'amenities' => ['ar' => 'رياضات مائية', 'en' => 'Water sports'],
                'recommended_visit_season' => ['ar' => 'الصيف (يونيو - أغسطس)', 'en' => 'Summer (June - August)'],
                'category_id' => 2,
                'annual_visitors_min' => 20000,
                'annual_visitors_max' => 60000,
                'status' => true,
                'lat' => 26.60853000,
                'lng' => 37.92316000
            ],
            [
                'name' => ['ar' => 'الرياض القديمة', 'en' => 'Old Riyadh'],
                'body' => ['ar' => 'وجهة تاريخية مليئة بالتراث.', 'en' => 'A historic destination full of heritage.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الرياض القديمة باللغة العربية.</div>',
                    'en' => '<div>Details about Old Riyadh in English.</div>'
                ],
                'slug' => 'old-riyadh',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'الطقس حار في الصيف', 'en' => 'Hot weather in summer'],
                'amenities' => ['ar' => 'مطاعم، متاحف', 'en' => 'Restaurants, Museums'],
                'recommended_visit_season' => ['ar' => 'الشتاء (ديسمبر - فبراير)', 'en' => 'Winter (December - February)'],
                'category_id' => 3,
                'annual_visitors_min' => 70000,
                'annual_visitors_max' => 150000,
                'status' => true,
                'lat' => 26.60853000,
                'lng' => 37.92316000
            ],
            [
                'name' => ['ar' => 'جبال فيفاء', 'en' => 'Jabal Fayfa'],
                'body' => ['ar' => 'وجهة مثالية لعشاق الطبيعة.', 'en' => 'An ideal destination for nature lovers.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن جبال فيفاء باللغة العربية.</div>',
                    'en' => '<div>Details about Jabal Fayfa in English.</div>'
                ],
                'slug' => 'jabal-fayfa',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'الطقس ضبابي', 'en' => 'Foggy weather'],
                'amenities' => ['ar' => 'تسلق الجبال', 'en' => 'Mountain climbing'],
                'recommended_visit_season' => ['ar' => 'الخريف (سبتمبر - نوفمبر)', 'en' => 'Autumn (September - November)'],
                'category_id' => 4,
                'annual_visitors_min' => 10000,
                'annual_visitors_max' => 50000,
                'status' => true,
                'lat' => 26.60853000,
                'lng' => 37.92316000
            ],
            [
                'name' => ['ar' => 'الكثبان الرملية', 'en' => 'Sand Dunes'],
                'body' => ['ar' => 'مغامرات مثيرة في الصحراء.', 'en' => 'Exciting adventures in the desert.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الكثبان الرملية باللغة العربية.</div>',
                    'en' => '<div>Details about the Sand Dunes in English.</div>'
                ],
                'slug' => 'sand-dunes',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'الطقس مشمس', 'en' => 'Sunny weather'],
                'amenities' => ['ar' => 'تأجير سيارات دفع رباعي', 'en' => '4x4 Rentals'],
                'recommended_visit_season' => ['ar' => 'الشتاء (نوفمبر - فبراير)', 'en' => 'Winter (November - February)'],
                'category_id' => 5,
                'annual_visitors_min' => 5000,
                'annual_visitors_max' => 20000,
                'status' => true,
                'lat' => 26.60853000,
                'lng' => 37.92316000
            ]
        ];

        collect($destinations)->map(function ($item) {
            Destination::query()->create($item);
        });
    }
}
