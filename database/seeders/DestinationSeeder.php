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
                'name' => ['ar' => 'مدائن صالح', 'en' => 'Madain Saleh'],
                'body' => ['ar' => 'اكتشف المعالم التاريخية الفريدة في مدائن صالح.', 'en' => 'Explore the unique historical landmarks of Madain Saleh.'],
                'rating' => 4.9,
                'image' => 'destinations/madain_saleh.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'جبل الفيل', 'en' => 'Elephant Rock'],
                'body' => ['ar' => 'استمتع بمشاهد جبل الفيل المدهش في العلا.', 'en' => 'Enjoy the stunning views of Elephant Rock in Al-Ula.'],
                'rating' => 4.8,
                'image' => 'destinations/elephant_rock.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'قصر المورو', 'en' => 'Al-Murooj Palace'],
                'body' => ['ar' => 'تعرف على تاريخ قصر المورو الرائع.', 'en' => 'Learn about the rich history of Al-Murooj Palace.'],
                'rating' => 4.7,
                'image' => 'destinations/al_murooj_palace.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'واحة العلا', 'en' => 'Al-Ula Oasis'],
                'body' => ['ar' => 'تمتع بجمال الواحة الخلابة في العلا.', 'en' => 'Enjoy the breathtaking beauty of Al-Ula Oasis.'],
                'rating' => 4.6,
                'image' => 'destinations/al_ula_oasis.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع الديسة', 'en' => 'Al-Disah Valley'],
                'body' => ['ar' => 'اكتشف جمال وادي الديسة الفريد.', 'en' => 'Discover the unique beauty of Al-Disah Valley.'],
                'rating' => 4.9,
                'image' => 'destinations/al_disah_valley.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'متحف العلا', 'en' => 'Al-Ula Museum'],
                'body' => ['ar' => 'اكتشف المعروضات الثقافية في متحف العلا.', 'en' => 'Explore the cultural exhibits at the Al-Ula Museum.'],
                'rating' => 4.5,
                'image' => 'destinations/al_ula_museum.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'جبل عكمة', 'en' => 'Jabal Ikmah'],
                'body' => ['ar' => 'اكتشف النقوش القديمة في جبل عكمة.', 'en' => 'Discover the ancient inscriptions at Jabal Ikmah.'],
                'rating' => 4.7,
                'image' => 'destinations/jabal_ikmah.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'الدرعية القديمة', 'en' => 'Old Diriyah'],
                'body' => ['ar' => 'استمتع بتاريخ الدرعية القديمة في العلا.', 'en' => 'Enjoy the rich history of Old Diriyah in Al-Ula.'],
                'rating' => 4.6,
                'image' => 'destinations/old_diriyah.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع العلا للأنشطة الرياضية', 'en' => 'Al-Ula Sports Complex'],
                'body' => ['ar' => 'استمتع بمرافق الأنشطة الرياضية في العلا.', 'en' => 'Enjoy sports activities at the Al-Ula Sports Complex.'],
                'rating' => 4.4,
                'image' => 'destinations/al_ula_sports_complex.jpg',
                'category_id' => 4,
                'status' => true
            ],
            [
                'name' => ['ar' => 'منطقة الحجر', 'en' => 'Hegra Archaeological Site'],
                'body' => ['ar' => 'اكتشف موقع الحجر الأثري في العلا.', 'en' => 'Explore the archaeological site of Hegra in Al-Ula.'],
                'rating' => 4.9,
                'image' => 'destinations/hegra_site.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'البلدة القديمة', 'en' => 'Old Town'],
                'body' => ['ar' => 'استمتع بزيارة البلدة القديمة في العلا.', 'en' => 'Enjoy visiting the old town of Al-Ula.'],
                'rating' => 4.7,
                'image' => 'destinations/old_town.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع جبل الفتاة', 'en' => 'Jabal Al-Fata'],
                'body' => ['ar' => 'اكتشف جبل الفتاة مع مناظره الخلابة.', 'en' => 'Discover Jabal Al-Fata with its scenic views.'],
                'rating' => 4.8,
                'image' => 'destinations/jabal_al_fata.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع القريه القديمة', 'en' => 'The Old Village'],
                'body' => ['ar' => 'استمتع بمشاهدة القريه القديمة في العلا.', 'en' => 'Enjoy the view of the old village in Al-Ula.'],
                'rating' => 4.5,
                'image' => 'destinations/old_village.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'وادي الطيب', 'en' => 'Wadi Al-Tayeb'],
                'body' => ['ar' => 'استمتع بمنظر وادي الطيب الخلاب.', 'en' => 'Enjoy the breathtaking views of Wadi Al-Tayeb.'],
                'rating' => 4.8,
                'image' => 'destinations/wadi_al_tayeb.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'متحف العلا للطبيعة', 'en' => 'Al-Ula Nature Museum'],
                'body' => ['ar' => 'اكتشف تنوع الطبيعة في متحف العلا.', 'en' => 'Explore the diversity of nature at the Al-Ula Nature Museum.'],
                'rating' => 4.6,
                'image' => 'destinations/al_ula_nature_museum.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'منتزه وادي القرى', 'en' => 'Wadi Al-Qura Park'],
                'body' => ['ar' => 'تمتع بالمشي في منتزه وادي القرى الرائع.', 'en' => 'Enjoy walking in the beautiful Wadi Al-Qura Park.'],
                'rating' => 4.7,
                'image' => 'destinations/wadi_al_qura_park.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'جبل الحرات', 'en' => 'Harrat Mountain'],
                'body' => ['ar' => 'استمتع بمشاهد جبل الحرات الرائع في العلا.', 'en' => 'Enjoy the amazing views of Harrat Mountain in Al-Ula.'],
                'rating' => 4.8,
                'image' => 'destinations/harrat_mountain.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع عيون الماء', 'en' => 'Water Springs'],
                'body' => ['ar' => 'استمتع بالمشي على طول عيون الماء في العلا.', 'en' => 'Enjoy walking along the water springs of Al-Ula.'],
                'rating' => 4.5,
                'image' => 'destinations/water_springs.jpg',
                'category_id' => 2,
                'status' => true
            ]
        ];

        collect($destinations)->map(function ($item) {
            Destination::query()->create($item);
        });
    }
}
