<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accommodations = [
            [
                'title' => ['en' => 'Luxury Hotel', 'ar' => 'فندق فاخر'],
                'type' => 'HOTEL',
                'rating' => 4.8,
                'body' => ['en' => 'A luxury hotel with top-tier facilities.', 'ar' => 'فندق فاخر مع مرافق من الدرجة الأولى.'],
                'price' => 500.00,
                'image' => 'images/luxury_hotel.jpg',
            ],
            [
                'title' => ['en' => 'Desert Caravan', 'ar' => 'كارافان صحراوي'],
                'type' => 'CARAVAN',
                'rating' => 4.5,
                'body' => ['en' => 'Experience the desert in a stylish caravan.', 'ar' => 'تجربة الصحراء في كارافان أنيق.'],
                'price' => 250.00,
                'image' => 'images/desert_caravan.jpg',
            ],
            [
                'title' => ['en' => 'Beach Chalet', 'ar' => 'شاليه على الشاطئ'],
                'type' => 'CHALET',
                'rating' => 4.7,
                'body' => ['en' => 'Relax in a beautiful beach chalet.', 'ar' => 'استرخِ في شاليه جميل على الشاطئ.'],
                'price' => 400.00,
                'image' => 'images/beach_chalet.jpg',
            ],
            [
                'title' => ['en' => 'Mountain Camp', 'ar' => 'مخيم جبلي'],
                'type' => 'CAMP',
                'rating' => 4.2,
                'body' => ['en' => 'Enjoy a stay in a mountain camp.', 'ar' => 'استمتع بالإقامة في مخيم جبلي.'],
                'price' => 150.00,
                'image' => 'images/mountain_camp.jpg',
            ],
            [
                'title' => ['en' => 'Island Resort', 'ar' => 'منتجع الجزيرة'],
                'type' => 'RESORT',
                'rating' => 4.9,
                'body' => ['en' => 'A luxurious island resort for relaxation.', 'ar' => 'منتجع جزيرة فاخر للاسترخاء.'],
                'price' => 1000.00,
                'image' => 'images/island_resort.jpg',
            ],
            [
                'title' => ['en' => 'Urban Hotel', 'ar' => 'فندق حضري'],
                'type' => 'HOTEL',
                'rating' => 4.3,
                'body' => ['en' => 'Stay in the heart of the city.', 'ar' => 'الإقامة في قلب المدينة.'],
                'price' => 300.00,
                'image' => 'images/urban_hotel.jpg',
            ],
            [
                'title' => ['en' => 'Safari Caravan', 'ar' => 'كارافان سفاري'],
                'type' => 'CARAVAN',
                'rating' => 4.6,
                'body' => ['en' => 'Explore the wilderness in a safari caravan.', 'ar' => 'استكشاف الحياة البرية في كارافان سفاري.'],
                'price' => 350.00,
                'image' => 'images/safari_caravan.jpg',
            ],
            [
                'title' => ['en' => 'Forest Chalet', 'ar' => 'شاليه في الغابة'],
                'type' => 'CHALET',
                'rating' => 4.4,
                'body' => ['en' => 'A serene forest chalet experience.', 'ar' => 'تجربة شاليه هادئة في الغابة.'],
                'price' => 375.00,
                'image' => 'images/forest_chalet.jpg',
            ],
            [
                'title' => ['en' => 'Desert Camp', 'ar' => 'مخيم صحراوي'],
                'type' => 'CAMP',
                'rating' => 4.1,
                'body' => ['en' => 'Stay under the stars in the desert.', 'ar' => 'الإقامة تحت النجوم في الصحراء.'],
                'price' => 200.00,
                'image' => 'images/desert_camp.jpg',
            ],
            [
                'title' => ['en' => 'Luxury Resort', 'ar' => 'منتجع فاخر'],
                'type' => 'RESORT',
                'rating' => 4.9,
                'body' => ['en' => 'Unmatched luxury in a premium resort.', 'ar' => 'رفاهية لا مثيل لها في منتجع متميز.'],
                'price' => 1200.00,
                'image' => 'images/luxury_resort.jpg',
            ],
        ];

        collect($accommodations)->map(function ($item) {
            Accommodation::query()->create($item);
        });
    }
}
