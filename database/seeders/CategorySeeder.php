<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => ['ar' => 'مواقع تاريخية', 'en' => 'Historical Sites'],
                'body' => ['ar' => 'استكشف المواقع التاريخية العريقة في العلا.', 'en' => 'Explore the ancient historical sites of Al-Ula.'],
                'image' => 'categories/historical_sites.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'مناطق طبيعية', 'en' => 'Natural Areas'],
                'body' => ['ar' => 'استمتع بجمال الطبيعة في العلا.', 'en' => 'Enjoy the natural beauty of Al-Ula.'],
                'image' => 'categories/natural_areas.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'مغامرات الصحراء', 'en' => 'Desert Adventures'],
                'body' => ['ar' => 'انغمس في مغامرات الصحراء الرائعة.', 'en' => 'Dive into exciting desert adventures.'],
                'image' => 'categories/desert_adventures.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'منتجعات فاخرة', 'en' => 'Luxury Resorts'],
                'body' => ['ar' => 'تمتع بإقامة فاخرة في منتجعات العلا.', 'en' => 'Enjoy luxurious stays at Al-Ula resorts.'],
                'image' => 'categories/luxury_resorts.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'فنادق بوتيكية', 'en' => 'Boutique Hotels'],
                'body' => ['ar' => 'تمتع بإقامة مريحة في الفنادق البوتيكية العلا.', 'en' => 'Enjoy a comfortable stay at Al-Ula boutique hotels.'],
                'image' => 'categories/boutique_hotels.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'الأنشطة الثقافية', 'en' => 'Cultural Activities'],
                'body' => ['ar' => 'اكتشف الأنشطة الثقافية المتنوعة في العلا.', 'en' => 'Discover the diverse cultural activities in Al-Ula.'],
                'image' => 'categories/cultural_activities.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'رحلات جوية', 'en' => 'Aerial Tours'],
                'body' => ['ar' => 'استمتع بجولات جوية مذهلة فوق العلا.', 'en' => 'Enjoy stunning aerial tours over Al-Ula.'],
                'image' => 'categories/aerial_tours.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'مواقع تصوير', 'en' => 'Filming Locations'],
                'body' => ['ar' => 'استمتع بمواقع التصوير الشهيرة في العلا.', 'en' => 'Enjoy the famous filming locations in Al-Ula.'],
                'image' => 'categories/filming_locations.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'الأنشطة الرياضية', 'en' => 'Sports Activities'],
                'body' => ['ar' => 'ممارسة الأنشطة الرياضية في العلا على أعلى مستوى.', 'en' => 'Engage in top-level sports activities in Al-Ula.'],
                'image' => 'categories/sports_activities.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'رحلات السفاري', 'en' => 'Safari Trips'],
                'body' => ['ar' => 'اكتشف مغامرات السفاري الصحراوية في العلا.', 'en' => 'Discover desert safari adventures in Al-Ula.'],
                'image' => 'categories/safari_trips.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'مهرجانات ثقافية', 'en' => 'Cultural Festivals'],
                'body' => ['ar' => 'شارك في المهرجانات الثقافية المميزة في العلا.', 'en' => 'Participate in the unique cultural festivals of Al-Ula.'],
                'image' => 'categories/cultural_festivals.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'الأنشطة العائلية', 'en' => 'Family Activities'],
                'body' => ['ar' => 'استمتع بأنشطة عائلية تناسب جميع الأعمار في العلا.', 'en' => 'Enjoy family-friendly activities for all ages in Al-Ula.'],
                'image' => 'categories/family_activities.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'جولات المدينة', 'en' => 'City Tours'],
                'body' => ['ar' => 'استكشف معالم المدينة المميزة في العلا.', 'en' => 'Explore the iconic city landmarks of Al-Ula.'],
                'image' => 'categories/city_tours.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'التراث المحلي', 'en' => 'Local Heritage'],
                'body' => ['ar' => 'استمتع بالتعرف على التراث المحلي في العلا.', 'en' => 'Enjoy learning about the local heritage of Al-Ula.'],
                'image' => 'categories/local_heritage.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'مناطق رياضية', 'en' => 'Sports Areas'],
                'body' => ['ar' => 'تمتع بمناطق رياضية حديثة في العلا.', 'en' => 'Enjoy modern sports areas in Al-Ula.'],
                'image' => 'categories/sports_areas.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'التسوق في العلا', 'en' => 'Shopping in Al-Ula'],
                'body' => ['ar' => 'اكتشف أفضل أماكن التسوق في العلا.', 'en' => 'Discover the best shopping spots in Al-Ula.'],
                'image' => 'categories/shopping_alula.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'الحدائق العامة', 'en' => 'Public Parks'],
                'body' => ['ar' => 'استمتع بالأجواء الهادئة في حدائق العلا العامة.', 'en' => 'Enjoy the peaceful ambiance of Al-Ula public parks.'],
                'image' => 'categories/public_parks.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'مطاعم فاخرة', 'en' => 'Fine Dining'],
                'body' => ['ar' => 'تناول الطعام في أفضل المطاعم الفاخرة في العلا.', 'en' => 'Dine in the finest restaurants in Al-Ula.'],
                'image' => 'categories/fine_dining.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'المغامرات الجبلية', 'en' => 'Mountain Adventures'],
                'body' => ['ar' => 'استمتع بتجارب مغامرات جبلية في العلا.', 'en' => 'Enjoy thrilling mountain adventures in Al-Ula.'],
                'image' => 'categories/mountain_adventures.jpg',
                'status' => true
            ],
            [
                'name' => ['ar' => 'حجز رحلات', 'en' => 'Trip Booking'],
                'body' => ['ar' => 'احجز رحلاتك السياحية بكل سهولة في العلا.', 'en' => 'Book your tours easily in Al-Ula.'],
                'image' => 'categories/trip_booking.jpg',
                'status' => true
            ]
        ];

        collect($categories)->map(function ($item) {
            Category::query()->create($item);
        });
    }
}
