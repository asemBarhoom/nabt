<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => json_encode(['en' => 'Privacy Policy', 'ar' => 'سياسة الخصوصية']),
            'body' => json_encode([
                'en' => '<h2>Privacy Policy</h2><p>We value your privacy. This policy explains how we collect, use, and protect your personal information.</p>',
                'ar' => '<h2>سياسة الخصوصية</h2><p>نحن نقدر خصوصيتك. تشرح هذه السياسة كيفية جمع معلوماتك الشخصية واستخدامها وحمايتها.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'Terms and Conditions', 'ar' => 'الشروط والأحكام']),
            'body' => json_encode([
                'en' => '<h2>Terms and Conditions</h2><p>By using our website, you agree to our terms and conditions. Please read them carefully.</p>',
                'ar' => '<h2>الشروط والأحكام</h2><p>باستخدامك لموقعنا، فإنك توافق على شروطنا وأحكامنا. يرجى قراءتها بعناية.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'Cookie Policy', 'ar' => 'سياسة الكوكيز']),
            'body' => json_encode([
                'en' => '<h2>Cookie Policy</h2><p>This website uses cookies to improve your experience. By continuing, you consent to the use of cookies.</p>',
                'ar' => '<h2>سياسة الكوكيز</h2><p>يستخدم هذا الموقع الكوكيز لتحسين تجربتك. باستخدام الموقع، فإنك توافق على استخدام الكوكيز.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'Refund and Return Policy', 'ar' => 'سياسة الاسترجاع والإرجاع']),
            'body' => json_encode([
                'en' => '<h2>Refund and Return Policy</h2><p>If you are not satisfied with your purchase, you can return it within 30 days for a full refund.</p>',
                'ar' => '<h2>سياسة الاسترجاع والإرجاع</h2><p>إذا لم تكن راضيًا عن مشترياتك، يمكنك إرجاعها في غضون 30 يومًا لاسترداد المبلغ بالكامل.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'Shipping Policy', 'ar' => 'سياسة الشحن']),
            'body' => json_encode([
                'en' => '<h2>Shipping Policy</h2><p>We offer free shipping on all orders over $50. Shipping times vary based on your location.</p>',
                'ar' => '<h2>سياسة الشحن</h2><p>نحن نقدم الشحن المجاني على جميع الطلبات التي تتجاوز 50 دولارًا. تختلف أوقات الشحن حسب موقعك.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'Disclaimer', 'ar' => 'إخلاء المسؤولية']),
            'body' => json_encode([
                'en' => '<h2>Disclaimer</h2><p>The content provided on this website is for informational purposes only. We do not guarantee the accuracy of the information.</p>',
                'ar' => '<h2>إخلاء المسؤولية</h2><p>المحتوى المقدم على هذا الموقع هو لأغراض معلوماتية فقط. نحن لا نضمن دقة المعلومات.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'Accessibility Statement', 'ar' => 'بيان الوصول']),
            'body' => json_encode([
                'en' => '<h2>Accessibility Statement</h2><p>We are committed to ensuring that our website is accessible to everyone, including individuals with disabilities.</p>',
                'ar' => '<h2>بيان الوصول</h2><p>نحن ملتزمون بضمان أن موقعنا الإلكتروني متاح للجميع، بما في ذلك الأفراد ذوي الإعاقات.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'User-Generated Content Policy', 'ar' => 'سياسة المحتوى الذي ينشئه المستخدم']),
            'body' => json_encode([
                'en' => '<h2>User-Generated Content Policy</h2><p>Users are responsible for any content they post on our platform. We do not allow illegal or harmful content.</p>',
                'ar' => '<h2>سياسة المحتوى الذي ينشئه المستخدم</h2><p>المستخدمون مسؤولون عن أي محتوى ينشرونه على منصتنا. نحن لا نسمح بالمحتوى غير القانوني أو الضار.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => json_encode(['en' => 'Affiliate Disclosure', 'ar' => 'إفصاح الشركاء التابعين']),
            'body' => json_encode([
                'en' => '<h2>Affiliate Disclosure</h2><p>We may earn commissions through affiliate links on our site. This helps us maintain and improve the website.</p>',
                'ar' => '<h2>إفصاح الشركاء التابعين</h2><p>قد نربح عمولات من خلال الروابط التابعة على موقعنا. يساعد ذلك في الحفاظ على الموقع وتحسينه.</p>',
            ]),
            'image' => null,
            'status' => true,
        ]);
    }
}
