<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'title' => json_encode(['en' => 'What services does Nabat Tourism offer?', 'ar' => 'ما هي خدمات نبط السياحي؟']),
                'body' => json_encode(['en' => 'Nabat Tourism offers historical and cultural tours, flight bookings, and tailored services for tourists.', 'ar' => 'نبط السياحي يقدم جولات تاريخية وثقافية، حجز رحلات، وخدمات مخصصة للسياح.']),
                'image' => 'faq1.jpg',
                'status' => true,
                'category_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => json_encode(['en' => 'How can I book a tour?', 'ar' => 'كيف يمكنني حجز جولة سياحية؟']),
                'body' => json_encode(['en' => 'You can book a tour through our website or by contacting our support team.', 'ar' => 'يمكنك حجز جولة من خلال موقعنا الإلكتروني أو عبر التواصل مع فريق الدعم.']),
                'image' => 'faq2.jpg',
                'status' => true,
                'category_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => json_encode(['en' => 'What is the cancellation policy for bookings?', 'ar' => 'ما هي سياسة الإلغاء للحجوزات؟']),
                'body' => json_encode(['en' => 'Cancellations can be made within 48 hours of booking for a full refund.', 'ar' => 'يمكن إجراء الإلغاءات خلال 48 ساعة من الحجز لاسترداد كامل المبلغ.']),
                'image' => 'faq3.jpg',
                'status' => true,
                'category_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
