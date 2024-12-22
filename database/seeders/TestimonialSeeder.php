<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name' => [
                    'ar' => 'عبد الله السعودي',
                    'en' => 'Abdullah Al-Saudi'
                ],
                'position' => [
                    'ar' => 'مسافر',
                    'en' => 'Traveler'
                ],
                'body' => [
                    'ar' => 'أفضل تجربة سفر مررت بها. أوصي بها بشدة لكل عشاق المغامرات.',
                    'en' => 'The best travel experience I have ever had. Highly recommended for adventure lovers.'
                ],
                'rating' => 4.8,
                'image' => 'testimonials/abdullah.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'فاطمة الحربي',
                    'en' => 'Fatima Alharbi'
                ],
                'position' => [
                    'ar' => 'سائحة',
                    'en' => 'Tourist'
                ],
                'body' => [
                    'ar' => 'كانت الرحلة مذهلة ومليئة بالتجارب الجديدة.',
                    'en' => 'The trip was amazing and full of new experiences.'
                ],
                'rating' => 4.7,
                'image' => 'testimonials/fatima.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'أحمد الراشد',
                    'en' => 'Ahmed Al-Rashed'
                ],
                'position' => [
                    'ar' => 'مسافر',
                    'en' => 'Traveler'
                ],
                'body' => [
                    'ar' => 'مغامرة لا تُنسى وسط الصحراء الخلابة.',
                    'en' => 'An unforgettable adventure in the breathtaking desert.'
                ],
                'rating' => 4.9,
                'image' => 'testimonials/ahmed.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'سلمى الخوري',
                    'en' => 'Salma Al-Khouri'
                ],
                'position' => [
                    'ar' => 'مسافرة',
                    'en' => 'Traveler'
                ],
                'body' => [
                    'ar' => 'استمتعت بجمال الطبيعة والضيافة الرائعة.',
                    'en' => 'I enjoyed the beauty of nature and the wonderful hospitality.'
                ],
                'rating' => 5.0,
                'image' => 'testimonials/salma.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'محمد السعيد',
                    'en' => 'Mohammed Al-Saeed'
                ],
                'position' => [
                    'ar' => 'سائح',
                    'en' => 'Tourist'
                ],
                'body' => [
                    'ar' => 'خدمة ممتازة ورحلة تفوق التوقعات.',
                    'en' => 'Excellent service and a trip beyond expectations.'
                ],
                'rating' => 4.6,
                'image' => 'testimonials/mohammed.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'نورة العتيبي',
                    'en' => 'Noura Al-Otaibi'
                ],
                'position' => [
                    'ar' => 'مسافرة',
                    'en' => 'Traveler'
                ],
                'body' => [
                    'ar' => 'كل شيء كان مرتبًا واحترافيًا للغاية.',
                    'en' => 'Everything was organized and very professional.'
                ],
                'rating' => 4.8,
                'image' => 'testimonials/noura.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'عبد الرحمن الشمري',
                    'en' => 'Abdulrahman Al-Shammari'
                ],
                'position' => [
                    'ar' => 'مسافر',
                    'en' => 'Traveler'
                ],
                'body' => [
                    'ar' => 'تجربة مميزة وخدمات على أعلى مستوى.',
                    'en' => 'A unique experience with top-notch services.'
                ],
                'rating' => 4.9,
                'image' => 'testimonials/abdulrahman.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'ليلى الزهراني',
                    'en' => 'Layla Al-Zahrani'
                ],
                'position' => [
                    'ar' => 'مسافرة',
                    'en' => 'Traveler'
                ],
                'body' => [
                    'ar' => 'أحببت كل التفاصيل الصغيرة في الرحلة.',
                    'en' => 'I loved every small detail of the trip.'
                ],
                'rating' => 4.7,
                'image' => 'testimonials/layla.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'عبد العزيز المطيري',
                    'en' => 'Abdulaziz Al-Mutairi'
                ],
                'position' => [
                    'ar' => 'مسافر',
                    'en' => 'Traveler'
                ],
                'body' => [
                    'ar' => 'أفضل تجربة سفر لي ولعائلتي.',
                    'en' => 'The best travel experience for me and my family.'
                ],
                'rating' => 5.0,
                'image' => 'testimonials/abdulaziz.jpg',
                'status' => true,
            ],
            [
                'name' => [
                    'ar' => 'ريم العنزي',
                    'en' => 'Reem Al-Anazi'
                ],
                'position' => [
                    'ar' => 'سائحة',
                    'en' => 'Tourist'
                ],
                'body' => [
                    'ar' => 'مزيج رائع بين الراحة والمغامرة.',
                    'en' => 'A great mix of comfort and adventure.'
                ],
                'rating' => 4.9,
                'image' => 'testimonials/reem.jpg',
                'status' => true,
            ]
        ];

        collect($testimonials)->map(function ($item) {
            Testimonial::query()->create($item);
        });

    }
}
