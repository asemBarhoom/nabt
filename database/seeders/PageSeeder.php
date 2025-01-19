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
            'title' => ['en' => 'Privacy Policy', 'ar' => 'سياسة الخصوصية'],
            'body' => [
                'en' => '<h2>Privacy Policy</h2>
        <p>We value your privacy and are committed to protecting it. This policy explains how we collect, use, and safeguard your personal information. By accessing our website, you agree to the practices outlined in this Privacy Policy.</p>
        <p>We may collect personal information such as your name, email address, phone number, and payment details. This information is used for processing transactions, personalizing your experience, and improving our services.</p>
        <p>We implement strict security measures to protect your information from unauthorized access. However, no method of transmission over the Internet is completely secure, so we cannot guarantee absolute security.</p>
        <p>If you have any questions about our Privacy Policy, feel free to contact us at any time.</p>',
                'ar' => '<h2>سياسة الخصوصية</h2>
        <p>نحن نقدر خصوصيتك ونلتزم بحمايتها. تشرح هذه السياسة كيفية جمع معلوماتك الشخصية واستخدامها وحمايتها. باستخدامك لموقعنا، فإنك توافق على الممارسات الموضحة في هذه السياسة.</p>
        <p>قد نجمع معلومات شخصية مثل اسمك، عنوان بريدك الإلكتروني، رقم هاتفك، وتفاصيل الدفع. تُستخدم هذه المعلومات لمعالجة العمليات، تخصيص تجربتك، وتحسين خدماتنا.</p>
        <p>نطبق إجراءات أمان صارمة لحماية معلوماتك من الوصول غير المصرح به. ومع ذلك، لا توجد وسيلة نقل عبر الإنترنت آمنة بنسبة 100%، لذا لا يمكننا ضمان الأمان المطلق.</p>
        <p>إذا كانت لديك أي أسئلة حول سياسة الخصوصية الخاصة بنا، فلا تتردد في الاتصال بنا في أي وقت.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'Terms and Conditions', 'ar' => 'الشروط والأحكام'],
            'body' => [
                'en' => '<h2>Terms and Conditions</h2>
        <p>Welcome to our website. By accessing or using our services, you agree to abide by the terms and conditions outlined below.</p>
        <p>Users must provide accurate and up-to-date information during registration. Any fraudulent or misleading actions are strictly prohibited and may result in account suspension or legal action.</p>
        <p>We reserve the right to update these terms at any time without prior notice. Continued use of our services after updates signifies acceptance of the revised terms.</p>
        <p>If you have questions about these terms, please contact our support team for clarification.</p>',
                'ar' => '<h2>الشروط والأحكام</h2>
        <p>مرحبًا بك في موقعنا. باستخدامك لخدماتنا، فإنك توافق على الالتزام بالشروط والأحكام الموضحة أدناه.</p>
        <p>يجب على المستخدمين تقديم معلومات دقيقة ومحدثة أثناء التسجيل. يُحظر تمامًا أي تصرفات احتيالية أو مضللة وقد تؤدي إلى تعليق الحساب أو اتخاذ إجراءات قانونية.</p>
        <p>نحتفظ بالحق في تحديث هذه الشروط في أي وقت دون إشعار مسبق. يعني استمرار استخدامك لخدماتنا بعد التحديثات قبولك للشروط المعدلة.</p>
        <p>إذا كانت لديك أي أسئلة حول هذه الشروط، يرجى التواصل مع فريق الدعم للحصول على التوضيح.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'Cookie Policy', 'ar' => 'سياسة الكوكيز'],
            'body' => [
                'en' => '<h2>Cookie Policy</h2>
        <p>Our website uses cookies to enhance your browsing experience. Cookies are small files stored on your device that help us remember your preferences and improve functionality.</p>
        <p>We use cookies to analyze traffic, personalize content, and deliver relevant advertisements. Some cookies are essential for the website to function, while others are optional and improve your experience.</p>
        <p>You can manage or disable cookies through your browser settings. However, disabling cookies may limit certain features on our website.</p>',
                'ar' => '<h2>سياسة الكوكيز</h2>
        <p>يستخدم موقعنا الكوكيز لتحسين تجربتك أثناء التصفح. الكوكيز هي ملفات صغيرة تُخزن على جهازك وتساعدنا في تذكر تفضيلاتك وتحسين الوظائف.</p>
        <p>نستخدم الكوكيز لتحليل حركة المرور، تخصيص المحتوى، وتقديم الإعلانات ذات الصلة. بعض الكوكيز ضرورية لعمل الموقع، في حين أن الأخرى اختيارية وتُحسن تجربتك.</p>
        <p>يمكنك إدارة أو تعطيل الكوكيز من خلال إعدادات المتصفح الخاص بك. ومع ذلك، قد يؤدي تعطيل الكوكيز إلى تقييد بعض ميزات موقعنا.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'Refund and Return Policy', 'ar' => 'سياسة الاسترجاع والإرجاع'],
            'body' => [
                'en' => '<h2>Refund and Return Policy</h2><p>If you are not satisfied with your purchase, you can return it within 30 days for a full refund.</p>',
                'ar' => '<h2>سياسة الاسترجاع والإرجاع</h2><p>إذا لم تكن راضيًا عن مشترياتك، يمكنك إرجاعها في غضون 30 يومًا لاسترداد المبلغ بالكامل.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'Shipping Policy', 'ar' => 'سياسة الشحن'],
            'body' => [
                'en' => '<h2>Shipping Policy</h2><p>We offer free shipping on all orders over $50. Shipping times vary based on your location.</p>',
                'ar' => '<h2>سياسة الشحن</h2><p>نحن نقدم الشحن المجاني على جميع الطلبات التي تتجاوز 50 دولارًا. تختلف أوقات الشحن حسب موقعك.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'Disclaimer', 'ar' => 'إخلاء المسؤولية'],
            'body' => [
                'en' => '<h2>Disclaimer</h2><p>The content provided on this website is for informational purposes only. We do not guarantee the accuracy of the information.</p>',
                'ar' => '<h2>إخلاء المسؤولية</h2><p>المحتوى المقدم على هذا الموقع هو لأغراض معلوماتية فقط. نحن لا نضمن دقة المعلومات.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'Accessibility Statement', 'ar' => 'بيان الوصول'],
            'body' => [
                'en' => '<h2>Accessibility Statement</h2><p>We are committed to ensuring that our website is accessible to everyone, including individuals with disabilities.</p>',
                'ar' => '<h2>بيان الوصول</h2><p>نحن ملتزمون بضمان أن موقعنا الإلكتروني متاح للجميع، بما في ذلك الأفراد ذوي الإعاقات.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'User-Generated Content Policy', 'ar' => 'سياسة المحتوى الذي ينشئه المستخدم'],
            'body' => [
                'en' => '<h2>User-Generated Content Policy</h2><p>Users are responsible for any content they post on our platform. We do not allow illegal or harmful content.</p>',
                'ar' => '<h2>سياسة المحتوى الذي ينشئه المستخدم</h2><p>المستخدمون مسؤولون عن أي محتوى ينشرونه على منصتنا. نحن لا نسمح بالمحتوى غير القانوني أو الضار.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);

        Page::create([
            'title' => ['en' => 'Affiliate Disclosure', 'ar' => 'إفصاح الشركاء التابعين'],
            'body' => [
                'en' => '<h2>Affiliate Disclosure</h2><p>We may earn commissions through affiliate links on our site. This helps us maintain and improve the website.</p>',
                'ar' => '<h2>إفصاح الشركاء التابعين</h2><p>قد نربح عمولات من خلال الروابط التابعة على موقعنا. يساعد ذلك في الحفاظ على الموقع وتحسينه.</p>',
            ],
            'image' => null,
            'status' => true,
        ]);
    }
}
