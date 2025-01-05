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
            ],
            [
                'name' => ['ar' => 'الشلالات المائية', 'en' => 'Waterfalls'],
                'body' => ['ar' => 'مناظر طبيعية خلابة.', 'en' => 'Stunning natural scenery.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الشلالات المائية باللغة العربية.</div>',
                    'en' => '<div>Details about the Waterfalls in English.</div>'
                ],
                'slug' => 'waterfalls',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'طقس منعش', 'en' => 'Refreshing weather'],
                'amenities' => ['ar' => 'مطاعم قريبة', 'en' => 'Nearby Restaurants'],
                'recommended_visit_season' => ['ar' => 'الربيع (مارس - مايو)', 'en' => 'Spring (March - May)'],
                'category_id' => 3,
                'annual_visitors_min' => 15000,
                'annual_visitors_max' => 50000,
                'status' => true,
                'lat' => 34.123456,
                'lng' => 74.123456
            ],
            [
                'name' => ['ar' => 'الحدائق الوطنية', 'en' => 'National Parks'],
                'body' => ['ar' => 'مغامرات في الطبيعة البرية.', 'en' => 'Adventures in the wild.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الحدائق الوطنية باللغة العربية.</div>',
                    'en' => '<div>Details about the National Parks in English.</div>'
                ],
                'slug' => 'national-parks',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'معتدل', 'en' => 'Moderate'],
                'amenities' => ['ar' => 'دورات مياه', 'en' => 'Restrooms'],
                'recommended_visit_season' => ['ar' => 'الخريف (سبتمبر - نوفمبر)', 'en' => 'Fall (September - November)'],
                'category_id' => 2,
                'annual_visitors_min' => 10000,
                'annual_visitors_max' => 40000,
                'status' => true,
                'lat' => 40.712776,
                'lng' => -74.005974
            ],
            [
                'name' => ['ar' => 'الجزر الاستوائية', 'en' => 'Tropical Islands'],
                'body' => ['ar' => 'استرخاء على الشواطئ الرملية.', 'en' => 'Relaxation on sandy beaches.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الجزر الاستوائية باللغة العربية.</div>',
                    'en' => '<div>Details about the Tropical Islands in English.</div>'
                ],
                'slug' => 'tropical-islands',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'مشمس مع نسيم البحر', 'en' => 'Sunny with sea breeze'],
                'amenities' => ['ar' => 'أماكن إقامة فاخرة', 'en' => 'Luxury Accommodations'],
                'recommended_visit_season' => ['ar' => 'الصيف (يونيو - أغسطس)', 'en' => 'Summer (June - August)'],
                'category_id' => 4,
                'annual_visitors_min' => 20000,
                'annual_visitors_max' => 80000,
                'status' => true,
                'lat' => 15.870032,
                'lng' => 100.992541
            ],
            [
                'name' => ['ar' => 'الجبال الثلجية', 'en' => 'Snowy Mountains'],
                'body' => ['ar' => 'تزلج وتجارب شتوية.', 'en' => 'Skiing and winter experiences.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الجبال الثلجية باللغة العربية.</div>',
                    'en' => '<div>Details about the Snowy Mountains in English.</div>'
                ],
                'slug' => 'snowy-mountains',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'ثلوج وبرودة', 'en' => 'Snowy and cold'],
                'amenities' => ['ar' => 'معدات تزلج', 'en' => 'Skiing Gear'],
                'recommended_visit_season' => ['ar' => 'الشتاء (ديسمبر - فبراير)', 'en' => 'Winter (December - February)'],
                'category_id' => 6,
                'annual_visitors_min' => 8000,
                'annual_visitors_max' => 30000,
                'status' => true,
                'lat' => 39.550051,
                'lng' => -105.782067
            ],
            [
                'name' => ['ar' => 'الأسواق الشعبية', 'en' => 'Local Markets'],
                'body' => ['ar' => 'تجارب ثقافية وتقاليد.', 'en' => 'Cultural experiences and traditions.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الأسواق الشعبية باللغة العربية.</div>',
                    'en' => '<div>Details about the Local Markets in English.</div>'
                ],
                'slug' => 'local-markets',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'معتدل طوال العام', 'en' => 'Mild all year round'],
                'amenities' => ['ar' => 'منتجات محلية', 'en' => 'Local Products'],
                'recommended_visit_season' => ['ar' => 'طوال العام', 'en' => 'Year-round'],
                'category_id' => 1,
                'annual_visitors_min' => 50000,
                'annual_visitors_max' => 150000,
                'status' => true,
                'lat' => 24.713552,
                'lng' => 46.675297
            ],
            [
                'name' => ['ar' => 'المدن القديمة', 'en' => 'Ancient Cities'],
                'body' => ['ar' => 'اكتشاف التاريخ.', 'en' => 'Discover history.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن المدن القديمة باللغة العربية.</div>',
                    'en' => '<div>Details about the Ancient Cities in English.</div>'
                ],
                'slug' => 'ancient-cities',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'مشمس وجاف', 'en' => 'Sunny and dry'],
                'amenities' => ['ar' => 'مرشدين سياحيين', 'en' => 'Tour Guides'],
                'recommended_visit_season' => ['ar' => 'الخريف', 'en' => 'Autumn'],
                'category_id' => 7,
                'annual_visitors_min' => 3000,
                'annual_visitors_max' => 12000,
                'status' => true,
                'lat' => 31.768318,
                'lng' => 35.213711
            ],
            [
                'name' => ['ar' => 'الكهوف', 'en' => 'Caves'],
                'body' => ['ar' => 'استكشاف أعماق الأرض.', 'en' => 'Explore the depths of the earth.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الكهوف باللغة العربية.</div>',
                    'en' => '<div>Details about the Caves in English.</div>'
                ],
                'slug' => 'caves',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'رطب ومظلم', 'en' => 'Humid and dark'],
                'amenities' => ['ar' => 'إضاءة وخوذ حماية', 'en' => 'Lighting and Helmets'],
                'recommended_visit_season' => ['ar' => 'الصيف', 'en' => 'Summer'],
                'category_id' => 8,
                'annual_visitors_min' => 2000,
                'annual_visitors_max' => 15000,
                'status' => true,
                'lat' => 36.778259,
                'lng' => -119.417931
            ],
            [
                'name' => ['ar' => 'البحيرات', 'en' => 'Lakes'],
                'body' => ['ar' => 'استمتاع بالمياه والطبيعة.', 'en' => 'Enjoy water and nature.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن البحيرات باللغة العربية.</div>',
                    'en' => '<div>Details about the Lakes in English.</div>'
                ],
                'slug' => 'lakes',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'معتدل وجميل', 'en' => 'Pleasant and mild'],
                'amenities' => ['ar' => 'قوارب', 'en' => 'Boats'],
                'recommended_visit_season' => ['ar' => 'الربيع والصيف', 'en' => 'Spring and Summer'],
                'category_id' => 9,
                'annual_visitors_min' => 5000,
                'annual_visitors_max' => 25000,
                'status' => true,
                'lat' => 47.606209,
                'lng' => -122.332069
            ],
            [
                'name' => ['ar' => 'المتاحف', 'en' => 'Museums'],
                'body' => ['ar' => 'تعلم واستكشاف التاريخ والفن.', 'en' => 'Learn and explore history and art.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن المتاحف باللغة العربية.</div>',
                    'en' => '<div>Details about the Museums in English.</div>'
                ],
                'slug' => 'museums',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'مناسب طوال العام', 'en' => 'Suitable year-round'],
                'amenities' => ['ar' => 'مواقف سيارات', 'en' => 'Parking'],
                'recommended_visit_season' => ['ar' => 'طوال العام', 'en' => 'Year-round'],
                'category_id' => 10,
                'annual_visitors_min' => 3000,
                'annual_visitors_max' => 10000,
                'status' => true,
                'lat' => 51.507351,
                'lng' => -0.127758
            ],
            [
                'name' => ['ar' => 'الصحارى', 'en' => 'Deserts'],
                'body' => ['ar' => 'مغامرات في الرمال.', 'en' => 'Adventures in the sand.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الصحارى باللغة العربية.</div>',
                    'en' => '<div>Details about the Deserts in English.</div>'
                ],
                'slug' => 'deserts',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'مشمس وحار', 'en' => 'Sunny and hot'],
                'amenities' => ['ar' => 'مخيمات صحراوية', 'en' => 'Desert Camps'],
                'recommended_visit_season' => ['ar' => 'الشتاء والربيع', 'en' => 'Winter and Spring'],
                'category_id' => 11,
                'annual_visitors_min' => 8000,
                'annual_visitors_max' => 25000,
                'status' => true,
                'lat' => 23.424076,
                'lng' => 53.847818
            ],
            [
                'name' => ['ar' => 'الغابات', 'en' => 'Forests'],
                'body' => ['ar' => 'استكشاف الطبيعة البرية.', 'en' => 'Explore the wild nature.'],
                'description' => [
                    'ar' => '<div>تفاصيل عن الغابات باللغة العربية.</div>',
                    'en' => '<div>Details about the Forests in English.</div>'
                ],
                'slug' => 'forests',
                'image' => 'destionation.png',
                'cover_image' => 'destionation.png',
                'weather_description' => ['ar' => 'رطب ومعتدل', 'en' => 'Humid and mild'],
                'amenities' => ['ar' => 'أماكن تخييم', 'en' => 'Camping Sites'],
                'recommended_visit_season' => ['ar' => 'الخريف', 'en' => 'Autumn'],
                'category_id' => 12,
                'annual_visitors_min' => 10000,
                'annual_visitors_max' => 50000,
                'status' => true,
                'lat' => 48.856613,
                'lng' => 2.352222
            ]
        ];

        collect($destinations)->map(function ($item) {
            Destination::query()->create($item);
        });
    }
}
