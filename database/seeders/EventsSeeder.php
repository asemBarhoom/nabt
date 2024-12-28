<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => [
                    'en' => 'Winter at Tantora',
                    'ar' => 'شتاء طنطورة'
                ],
            ],
            [
                'title' => [
                    'en' => 'Azimuth Festival',
                    'ar' => 'مهرجان أزيماث'
                ],
            ],
            [
                'title' => [
                    'en' => 'AlUla Skies Festival',
                    'ar' => 'مهرجان سماء العلا'
                ],
            ],
            [
                'title' => [
                    'en' => 'AlUla Wellness Festival',
                    'ar' => 'مهرجان العلا للعافية'
                ],
            ],
            [
                'title' => [
                    'en' => 'AlUla Trail Race',
                    'ar' => 'سباق العلا ترايل'
                ],
            ],
            [
                'title' => [
                    'en' => 'Desert X AlUla',
                    'ar' => 'صحراء إكس العلا'
                ],
            ],
            [
                'title' => [
                    'en' => 'Ancient Kingdoms Festival',
                    'ar' => 'مهرجان الممالك القديمة'
                ],
            ],
            [
                'title' => [
                    'en' => 'Hegra by Night',
                    'ar' => 'حجر الليل'
                ],
            ],
            [
                'title' => [
                    'en' => 'Maraya Concert Hall',
                    'ar' => 'قاعة مرايا للحفلات'
                ],
            ],
            [
                'title' => [
                    'en' => 'Desert Adventures',
                    'ar' => 'مغامرات الصحراء'
                ],
            ],
        ];

        foreach ($events as $event) {
            \App\Models\Event::create($event);
        }
    }
}
