<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
            [
                'name' => ['ar' => 'شركة دليل العلا السياحية', 'en' => 'Al-Ula Guide Tourism Company'],
                'body' => ['ar' => 'شركة سياحية تقدم خدمات متنوعة في مدينة العلا.', 'en' => 'A tourism company offering various services in Al-Ula.'],
                'image' => 'partner1.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة عصور للسياحة', 'en' => 'Aswar Tourism Company'],
                'body' => ['ar' => 'شركة سياحية متخصصة في تنظيم رحلات داخل العلا.', 'en' => 'A tourism company specializing in organizing trips within Al-Ula.'],
                'image' => 'partner2.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة أسرار العلا', 'en' => 'Asrar Al-Ula Company'],
                'body' => ['ar' => 'شركة تقدم خدمات سياحية ممتعة لاستكشاف معالم العلا.', 'en' => 'A company offering exciting tourism services to explore the landmarks of Al-Ula.'],
                'image' => 'partner1.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة متعتنا للسياحة والسفر', 'en' => 'Matatna Tourism and Travel Company'],
                'body' => ['ar' => 'تقدم الشركة رحلات سياحية متنوعة داخل العلا.', 'en' => 'The company offers various tourism trips within Al-Ula.'],
                'image' => 'partner2.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة العلا للمغامرات', 'en' => 'Al-Ula Adventures Company'],
                'body' => ['ar' => 'تختص بتقديم مغامرات سياحية في العلا.', 'en' => 'Specializes in offering adventure tourism in Al-Ula.'],
                'image' => 'partner1.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة الرواد للسياحة', 'en' => 'Al-Ruwad Tourism Company'],
                'body' => ['ar' => 'تقدم الشركة خدمات سياحية عالية الجودة في العلا.', 'en' => 'The company offers high-quality tourism services in Al-Ula.'],
                'image' => 'partner2.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة العلا للمرافق السياحية', 'en' => 'Al-Ula Tourist Facilities Company'],
                'body' => ['ar' => 'شركة متخصصة في توفير المرافق السياحية الحديثة في العلا.', 'en' => 'A company specializing in providing modern tourism facilities in Al-Ula.'],
                'image' => 'partner1.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة العلا للسياحة البيئية', 'en' => 'Al-Ula Eco-Tourism Company'],
                'body' => ['ar' => 'شركة متخصصة في السياحة البيئية في العلا.', 'en' => 'A company specializing in eco-tourism in Al-Ula.'],
                'image' => 'partner2.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة السعودية للسياحة', 'en' => 'Saudi Arabia Tourism Company'],
                'body' => ['ar' => 'تقدم الشركة رحلات سياحية فاخرة داخل العلا.', 'en' => 'The company offers luxurious tourism trips within Al-Ula.'],
                'image' => 'partner1.png',
                'status' => true
            ],
            [
                'name' => ['ar' => 'شركة الفخامة للسياحة', 'en' => 'Al-Fakhamah Tourism Company'],
                'body' => ['ar' => 'شركة فاخرة تقدم جولات سياحية خاصة في العلا.', 'en' => 'A luxury company offering private tours in Al-Ula.'],
                'image' => 'partner2.png',
                'status' => true
            ],
        ];

        collect($partners)->map(function ($item) {
            Partner::query()->create($item);
        });
    }
}
