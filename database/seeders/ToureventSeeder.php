<?php

namespace Database\Seeders;

use App\Models\Tourevent;
use Carbon\Carbon;
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
                'name' => ['ar' => 'مدائن صالح', 'en' => 'Madain Saleh'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف المعالم التاريخية الفريدة في مدائن صالح.', 'en' => 'Explore the unique historical landmarks of Madain Saleh.'],
                'description' => ['ar' => 'اكتشف المعالم التاريخية الفريدة في مدائن صالح.', 'en' => 'Explore the unique historical landmarks of Madain Saleh.'],
                'rating' => 4.9,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'جبل الفيل', 'en' => 'Elephant Rock'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بمشاهد جبل الفيل المدهش في العلا.', 'en' => 'Enjoy the stunning views of Elephant Rock in Al-Ula.'],
                'description' => ['ar' => 'استمتع بمشاهد جبل الفيل المدهش في العلا.', 'en' => 'Enjoy the stunning views of Elephant Rock in Al-Ula.'],
                'rating' => 4.8,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'قصر المورو', 'en' => 'Al-Murooj Palace'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'تعرف على تاريخ قصر المورو الرائع.', 'en' => 'Learn about the rich history of Al-Murooj Palace.'],
                'description' => ['ar' => 'تعرف على تاريخ قصر المورو الرائع.', 'en' => 'Learn about the rich history of Al-Murooj Palace.'],
                'rating' => 4.7,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'واحة العلا', 'en' => 'Al-Ula Oasis'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'تمتع بجمال الواحة الخلابة في العلا.', 'en' => 'Enjoy the breathtaking beauty of Al-Ula Oasis.'],
                'description' => ['ar' => 'تمتع بجمال الواحة الخلابة في العلا.', 'en' => 'Enjoy the breathtaking beauty of Al-Ula Oasis.'],
                'rating' => 4.6,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع الديسة', 'en' => 'Al-Disah Valley'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف جمال وادي الديسة الفريد.', 'en' => 'Discover the unique beauty of Al-Disah Valley.'],
                'description' => ['ar' => 'اكتشف جمال وادي الديسة الفريد.', 'en' => 'Discover the unique beauty of Al-Disah Valley.'],
                'rating' => 4.9,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'متحف العلا', 'en' => 'Al-Ula Museum'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف المعروضات الثقافية في متحف العلا.', 'en' => 'Explore the cultural exhibits at the Al-Ula Museum.'],
                'description' => ['ar' => 'اكتشف المعروضات الثقافية في متحف العلا.', 'en' => 'Explore the cultural exhibits at the Al-Ula Museum.'],
                'rating' => 4.5,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'جبل عكمة', 'en' => 'Jabal Ikmah'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف النقوش القديمة في جبل عكمة.', 'en' => 'Discover the ancient inscriptions at Jabal Ikmah.'],
                'description' => ['ar' => 'اكتشف النقوش القديمة في جبل عكمة.', 'en' => 'Discover the ancient inscriptions at Jabal Ikmah.'],
                'rating' => 4.7,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'الدرعية القديمة', 'en' => 'Old Diriyah'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بتاريخ الدرعية القديمة في العلا.', 'en' => 'Enjoy the rich history of Old Diriyah in Al-Ula.'],
                'description' => ['ar' => 'استمتع بتاريخ الدرعية القديمة في العلا.', 'en' => 'Enjoy the rich history of Old Diriyah in Al-Ula.'],
                'rating' => 4.6,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع العلا للأنشطة الرياضية', 'en' => 'Al-Ula Sports Complex'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بمرافق الأنشطة الرياضية في العلا.', 'en' => 'Enjoy sports activities at the Al-Ula Sports Complex.'],
                'description' => ['ar' => 'استمتع بمرافق الأنشطة الرياضية في العلا.', 'en' => 'Enjoy sports activities at the Al-Ula Sports Complex.'],
                'rating' => 4.4,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 4,
                'status' => true
            ],
            [
                'name' => ['ar' => 'منطقة الحجر', 'en' => 'Hegra Archaeological Site'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف موقع الحجر الأثري في العلا.', 'en' => 'Explore the archaeological site of Hegra in Al-Ula.'],
                'description' => ['ar' => 'اكتشف موقع الحجر الأثري في العلا.', 'en' => 'Explore the archaeological site of Hegra in Al-Ula.'],
                'rating' => 4.9,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 1,
                'status' => true
            ],
            [
                'name' => ['ar' => 'البلدة القديمة', 'en' => 'Old Town'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بزيارة البلدة القديمة في العلا.', 'en' => 'Enjoy visiting the old town of Al-Ula.'],
                'description' => ['ar' => 'استمتع بزيارة البلدة القديمة في العلا.', 'en' => 'Enjoy visiting the old town of Al-Ula.'],
                'rating' => 4.7,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع جبل الفتاة', 'en' => 'Jabal Al-Fata'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف جبل الفتاة مع مناظره الخلابة.', 'en' => 'Discover Jabal Al-Fata with its scenic views.'],
                'description' => ['ar' => 'اكتشف جبل الفتاة مع مناظره الخلابة.', 'en' => 'Discover Jabal Al-Fata with its scenic views.'],
                'rating' => 4.8,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'cover_image' => 'destionation.png',

                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع القريه القديمة', 'en' => 'The Old Village'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بمشاهدة القريه القديمة في العلا.', 'en' => 'Enjoy the view of the old village in Al-Ula.'],
                'description' => ['ar' => 'استمتع بمشاهدة القريه القديمة في العلا.', 'en' => 'Enjoy the view of the old village in Al-Ula.'],
                'rating' => 4.5,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'وادي الطيب', 'en' => 'Wadi Al-Tayeb'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بمنظر وادي الطيب الخلاب.', 'en' => 'Enjoy the breathtaking views of Wadi Al-Tayeb.'],
                'description' => ['ar' => 'استمتع بمنظر وادي الطيب الخلاب.', 'en' => 'Enjoy the breathtaking views of Wadi Al-Tayeb.'],
                'rating' => 4.8,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'متحف العلا للطبيعة', 'en' => 'Al-Ula Nature Museum'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف تنوع الطبيعة في متحف العلا.', 'en' => 'Explore the diversity of nature at the Al-Ula Nature Museum.'],
                'description' => ['ar' => 'اكتشف تنوع الطبيعة في متحف العلا.', 'en' => 'Explore the diversity of nature at the Al-Ula Nature Museum.'],
                'rating' => 4.6,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 3,
                'status' => true
            ],
            [
                'name' => ['ar' => 'منتزه وادي القرى', 'en' => 'Wadi Al-Qura Park'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'تمتع بالمشي في منتزه وادي القرى الرائع.', 'en' => 'Enjoy walking in the beautiful Wadi Al-Qura Park.'],
                'description' => ['ar' => 'تمتع بالمشي في منتزه وادي القرى الرائع.', 'en' => 'Enjoy walking in the beautiful Wadi Al-Qura Park.'],
                'rating' => 4.7,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'جبل الحرات', 'en' => 'Harrat Mountain'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بمشاهد جبل الحرات الرائع في العلا.', 'en' => 'Enjoy the amazing views of Harrat Mountain in Al-Ula.'],
                'description' => ['ar' => 'استمتع بمشاهد جبل الحرات الرائع في العلا.', 'en' => 'Enjoy the amazing views of Harrat Mountain in Al-Ula.'],
                'rating' => 4.8,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع عروس البحر', 'en' => 'Bride of the Sea'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بمشاهدة موقع عروس البحر الرائع.', 'en' => 'Enjoy the beautiful Bride of the Sea location.'],
                'description' => ['ar' => 'استمتع بمشاهدة موقع عروس البحر الرائع.', 'en' => 'Enjoy the beautiful Bride of the Sea location.'],
                'rating' => 4.6,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'جبل الثور', 'en' => 'Jabal Al-Thawr'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'استمتع بالتنزه في جبل الثور المهيب.', 'en' => 'Enjoy a hike in the majestic Jabal Al-Thawr.'],
                'description' => ['ar' => 'استمتع بالتنزه في جبل الثور المهيب.', 'en' => 'Enjoy a hike in the majestic Jabal Al-Thawr.'],
                'rating' => 4.7,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 2,
                'status' => true
            ],
            [
                'name' => ['ar' => 'موقع الرحمانية', 'en' => 'Al-Rahmaniya Site'],
                'position' => ['ar' => 'شمال المملكة', 'en' => 'Northern Region'],
                'body' => ['ar' => 'اكتشف تاريخ موقع الرحمانية في العلا.', 'en' => 'Explore the history of the Al-Rahmaniya Site in Al-Ula.'],
                'description' => ['ar' => 'اكتشف تاريخ موقع الرحمانية في العلا.', 'en' => 'Explore the history of the Al-Rahmaniya Site in Al-Ula.'],
                'rating' => 4.6,
                'at' => Carbon::now()->toDateTimeLocalString(),
                'image' => 'events.png',
                'category_id' => 1,
                'status' => true
            ]
        ];

        collect($tourevents)->map(function ($item) {
            Tourevent::query()->create($item);
        });
    }
}
