<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToureventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tourevents = [
            [
                'name' => json_encode(['ar' => 'مدائن صالح', 'en' => 'Madain Saleh']),
                'body' => json_encode(['ar' => 'اكتشف المعالم التاريخية الفريدة في مدائن صالح.', 'en' => 'Explore the unique historical landmarks of Madain Saleh.']),
                'rating' => 4.9,
                'image' => 'tourevents/madain_saleh.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'جبل الفيل', 'en' => 'Elephant Rock']),
                'body' => json_encode(['ar' => 'استمتع بمشاهد جبل الفيل المدهش في العلا.', 'en' => 'Enjoy the stunning views of Elephant Rock in Al-Ula.']),
                'rating' => 4.8,
                'image' => 'tourevents/elephant_rock.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'قصر المورو', 'en' => 'Al-Murooj Palace']),
                'body' => json_encode(['ar' => 'تعرف على تاريخ قصر المورو الرائع.', 'en' => 'Learn about the rich history of Al-Murooj Palace.']),
                'rating' => 4.7,
                'image' => 'tourevents/al_murooj_palace.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'واحة العلا', 'en' => 'Al-Ula Oasis']),
                'body' => json_encode(['ar' => 'تمتع بجمال الواحة الخلابة في العلا.', 'en' => 'Enjoy the breathtaking beauty of Al-Ula Oasis.']),
                'rating' => 4.6,
                'image' => 'tourevents/al_ula_oasis.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'موقع الديسة', 'en' => 'Al-Disah Valley']),
                'body' => json_encode(['ar' => 'اكتشف جمال وادي الديسة الفريد.', 'en' => 'Discover the unique beauty of Al-Disah Valley.']),
                'rating' => 4.9,
                'image' => 'tourevents/al_disah_valley.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'متحف العلا', 'en' => 'Al-Ula Museum']),
                'body' => json_encode(['ar' => 'اكتشف المعروضات الثقافية في متحف العلا.', 'en' => 'Explore the cultural exhibits at the Al-Ula Museum.']),
                'rating' => 4.5,
                'image' => 'tourevents/al_ula_museum.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'جبل عكمة', 'en' => 'Jabal Ikmah']),
                'body' => json_encode(['ar' => 'اكتشف النقوش القديمة في جبل عكمة.', 'en' => 'Discover the ancient inscriptions at Jabal Ikmah.']),
                'rating' => 4.7,
                'image' => 'tourevents/jabal_ikmah.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'الدرعية القديمة', 'en' => 'Old Diriyah']),
                'body' => json_encode(['ar' => 'استمتع بتاريخ الدرعية القديمة في العلا.', 'en' => 'Enjoy the rich history of Old Diriyah in Al-Ula.']),
                'rating' => 4.6,
                'image' => 'tourevents/old_diriyah.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'موقع العلا للأنشطة الرياضية', 'en' => 'Al-Ula Sports Complex']),
                'body' => json_encode(['ar' => 'استمتع بمرافق الأنشطة الرياضية في العلا.', 'en' => 'Enjoy sports activities at the Al-Ula Sports Complex.']),
                'rating' => 4.4,
                'image' => 'tourevents/al_ula_sports_complex.jpg',
                'category_id' => 4,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'منطقة الحجر', 'en' => 'Hegra Archaeological Site']),
                'body' => json_encode(['ar' => 'اكتشف موقع الحجر الأثري في العلا.', 'en' => 'Explore the archaeological site of Hegra in Al-Ula.']),
                'rating' => 4.9,
                'image' => 'tourevents/hegra_site.jpg',
                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'البلدة القديمة', 'en' => 'Old Town']),
                'body' => json_encode(['ar' => 'استمتع بزيارة البلدة القديمة في العلا.', 'en' => 'Enjoy visiting the old town of Al-Ula.']),
                'rating' => 4.7,
                'image' => 'tourevents/old_town.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'موقع جبل الفتاة', 'en' => 'Jabal Al-Fata']),
                'body' => json_encode(['ar' => 'اكتشف جبل الفتاة مع مناظره الخلابة.', 'en' => 'Discover Jabal Al-Fata with its scenic views.']),
                'rating' => 4.8,
                'image' => 'tourevents/jabal_al_fata.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'موقع القريه القديمة', 'en' => 'The Old Village']),
                'body' => json_encode(['ar' => 'استمتع بمشاهدة القريه القديمة في العلا.', 'en' => 'Enjoy the view of the old village in Al-Ula.']),
                'rating' => 4.5,
                'image' => 'tourevents/old_village.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'وادي الطيب', 'en' => 'Wadi Al-Tayeb']),
                'body' => json_encode(['ar' => 'استمتع بمنظر وادي الطيب الخلاب.', 'en' => 'Enjoy the breathtaking views of Wadi Al-Tayeb.']),
                'rating' => 4.8,
                'image' => 'tourevents/wadi_al_tayeb.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'متحف العلا للطبيعة', 'en' => 'Al-Ula Nature Museum']),
                'body' => json_encode(['ar' => 'اكتشف تنوع الطبيعة في متحف العلا.', 'en' => 'Explore the diversity of nature at the Al-Ula Nature Museum.']),
                'rating' => 4.6,
                'image' => 'tourevents/al_ula_nature_museum.jpg',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'منتزه وادي القرى', 'en' => 'Wadi Al-Qura Park']),
                'body' => json_encode(['ar' => 'تمتع بالمشي في منتزه وادي القرى الرائع.', 'en' => 'Enjoy walking in the beautiful Wadi Al-Qura Park.']),
                'rating' => 4.7,
                'image' => 'tourevents/wadi_al_qura_park.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'جبل الحرات', 'en' => 'Harrat Mountain']),
                'body' => json_encode(['ar' => 'استمتع بمشاهد جبل الحرات الرائع في العلا.', 'en' => 'Enjoy the amazing views of Harrat Mountain in Al-Ula.']),
                'rating' => 4.8,
                'image' => 'tourevents/harrat_mountain.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'موقع عروس البحر', 'en' => 'Bride of the Sea']),
                'body' => json_encode(['ar' => 'استمتع بمشاهدة موقع عروس البحر الرائع.', 'en' => 'Enjoy the beautiful Bride of the Sea location.']),
                'rating' => 4.6,
                'image' => 'tourevents/bride_of_the_sea.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'جبل الثور', 'en' => 'Jabal Al-Thawr']),
                'body' => json_encode(['ar' => 'استمتع بالتنزه في جبل الثور المهيب.', 'en' => 'Enjoy a hike in the majestic Jabal Al-Thawr.']),
                'rating' => 4.7,
                'image' => 'tourevents/jabal_al_thawr.jpg',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => json_encode(['ar' => 'موقع الرحمانية', 'en' => 'Al-Rahmaniya Site']),
                'body' => json_encode(['ar' => 'اكتشف تاريخ موقع الرحمانية في العلا.', 'en' => 'Explore the history of the Al-Rahmaniya Site in Al-Ula.']),
                'rating' => 4.6,
                'image' => 'tourevents/al_rahmaniya_site.jpg',
                'category_id' => 1,
                'status' => true
            ]
        ];

        DB::table('tourevents')->insert($tourevents);
    }
}
