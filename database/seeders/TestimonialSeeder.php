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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'The best travel experience I have ever had. Highly recommended for adventure lovers.'
                ],
                'rating' => 4.8,
                'image' => 'testimonials.png',
                'status' => true,
                'testimonialsable_id' => 1, // ID of the related model
                'testimonialsable_type' => 'App\Models\Destination', // Related model's class

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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'The trip was amazing and full of new experiences.'
                ],
                'rating' => 4.7,
                'image' => 'testimonials.png',
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'An unforgettable adventure in the breathtaking desert.'
                ],
                'rating' => 4.9,
                'image' => 'testimonials.png',
                'status' => true,
                'testimonialsable_id' => 1, // ID of the related model
                'testimonialsable_type' => 'App\Models\Destination', // Related model's class
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'I enjoyed the beauty of nature and the wonderful hospitality.'
                ],
                'rating' => 5.0,
                'image' => 'testimonials.png',
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'Excellent service and a trip beyond expectations.'
                ],
                'rating' => 4.6,
                'image' => 'testimonials.png',
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'Everything was organized and very professional.'
                ],
                'rating' => 4.8,
                'image' => 'testimonials.png',
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'A unique experience with top-notch services.'
                ],
                'rating' => 4.9,
                'image' => 'testimonials.png',
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'I loved every small detail of the trip.'
                ],
                'rating' => 4.7,
                'image' => 'testimonials.png',
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'The best travel experience for me and my family.'
                ],
                'rating' => 5.0,
                'image' => 'testimonials.png',
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
                    'ar' => "كانت الرحلة رائعة بكل المقاييس! التنظيم كان ممتازًا، والمرشد السياحي كان محترفًا وودودًا للغاية. استمتعنا بالمناظر الطبيعية الخلابة والأنشطة المميزة التي أضافت طابعًا خاصًا للرحلة. بالتأكيد ستكون هذه التجربة في قائمة ذكرياتي المفضلة، وأتطلع لتكرارها قريبًا!",
                    'en' => 'A great mix of comfort and adventure.'
                ],
                'rating' => 4.9,
                'image' => 'testimonials.png',
                'status' => true,
            ]
        ];

        collect($testimonials)->map(function ($item) {
            Testimonial::query()->create($item);
        });

    }
}
