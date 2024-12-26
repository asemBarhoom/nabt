<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $settings = [
            // General Settings
            ['key' => 'site_name_en', 'value' => 'My Web Application'],
            ['key' => 'site_name_ar', 'value' => 'تطبيق الويب الخاص بي'],

            ['key' => 'site_description_en', 'value' => 'The best web application for your needs.'],
            ['key' => 'site_description_ar', 'value' => 'أفضل تطبيق ويب لتلبية احتياجاتك.'],

            // Contact Information
            ['key' => 'contact_address_en', 'value' => '123 Main Street, New York, NY, USA'],
            ['key' => 'contact_address_ar', 'value' => '123 الشارع الرئيسي، نيويورك، الولايات المتحدة الأمريكية'],

            // SEO Settings
            ['key' => 'meta_keywords_en', 'value' => 'web, application, software, services'],
            ['key' => 'meta_keywords_ar', 'value' => 'ويب، تطبيق، برامج، خدمات'],

            ['key' => 'meta_description_en', 'value' => 'This is the meta description for the web app.'],
            ['key' => 'meta_description_ar', 'value' => 'هذا هو الوصف التعريفي لتطبيق الويب.'],

            // Maintenance Mode
            ['key' => 'maintenance_message_en', 'value' => 'We are currently performing maintenance. Please check back later.'],
            ['key' => 'maintenance_message_ar', 'value' => 'نحن نقوم حالياً بأعمال الصيانة. يرجى العودة لاحقاً.'],

            // Footer Settings
            ['key' => 'footer_copyright_en', 'value' => '© 2024 My Web Application. All rights reserved.'],
            ['key' => 'footer_copyright_ar', 'value' => '© 2024 تطبيق الويب الخاص بي. جميع الحقوق محفوظة.'],


            // Non-Language-Dependent Settings
            ['key' => 'site_logo', 'value' => '/images/logo.png'],
            ['key' => 'site_favicon', 'value' => '/images/favicon.ico'],
            ['key' => 'contact_email', 'value' => 'support@example.com'],
            ['key' => 'contact_phone', 'value' => '+1-800-123-4567'],
            ['key' => 'default_language', 'value' => 'en'],
            ['key' => 'timezone', 'value' => 'UTC'],
            ['key' => 'currency', 'value' => 'USD'],
            ['key' => 'currency_symbol', 'value' => '$'],
            ['key' => 'maintenance_mode', 'value' => 'off'],
            // Header Section
            ['key' => 'header_phone', 'value' => '+966 123-4567'],
            ['key' => 'header_email', 'value' => 'info@example.com'],

            // Hero Section
            ['key' => 'hero_title_en', 'value' => 'Explore the Desert Adventures'],
            ['key' => 'hero_title_ar', 'value' => 'اكتشف مغامرات الصحراء'],

            ['key' => 'hero_subtitle_en', 'value' => 'Experience the rich heritage and beauty of the Arabian desert.'],
            ['key' => 'hero_subtitle_ar', 'value' => 'استمتع بالتراث الغني وجمال الصحراء العربية.'],

            ['key' => 'hero_button_text_en', 'value' => 'Start Your Journey'],
            ['key' => 'hero_button_text_ar', 'value' => 'ابدأ رحلتك الآن'],

            // About Us Section
            ['key' => 'about_us_title_en', 'value' => 'About Our Company'],
            ['key' => 'about_us_title_ar', 'value' => 'عن الشركة'],

            ['key' => 'about_us_text_en', 'value' => 'We specialize in offering exceptional tourism services tailored to meet your needs.'],
            ['key' => 'about_us_text_ar', 'value' => 'نحن متخصصون في تقديم خدمات سياحية استثنائية مصممة لتلبية احتياجاتك.'],

            // Featured Destinations
            ['key' => 'featured_title_en', 'value' => 'Featured Destinations'],
            ['key' => 'featured_title_ar', 'value' => 'الوجهات المميزة'],

            // Steps Section
            ['key' => 'steps_title_en', 'value' => '5 Simple Steps to Discover Your Trip'],
            ['key' => 'steps_title_ar', 'value' => '5 خطوات بسيطة لاكتشاف رحلتك'],

            ['key' => 'steps_step1_en', 'value' => 'Choose Your Destination'],
            ['key' => 'steps_step1_ar', 'value' => 'اختر وجهتك'],

            ['key' => 'steps_step2_en', 'value' => 'Select a Travel Package'],
            ['key' => 'steps_step2_ar', 'value' => 'اختر باقة السفر'],

            ['key' => 'steps_step3_en', 'value' => 'Customize Your Trip'],
            ['key' => 'steps_step3_ar', 'value' => 'قم بتخصيص رحلتك'],

            ['key' => 'steps_step4_en', 'value' => 'Book Easily'],
            ['key' => 'steps_step4_ar', 'value' => 'احجز بسهولة'],

            ['key' => 'steps_step5_en', 'value' => 'Enjoy Your Experience'],
            ['key' => 'steps_step5_ar', 'value' => 'استمتع بتجربتك'],

            // Testimonials Section
            ['key' => 'testimonials_title_en', 'value' => 'What Our Clients Say'],
            ['key' => 'testimonials_title_ar', 'value' => 'آراء عملائنا'],

            // Footer Section
            ['key' => 'footer_about_us_en', 'value' => 'We are a leading tourism company offering premium services.'],
            ['key' => 'footer_about_us_ar', 'value' => 'نحن شركة سياحة رائدة تقدم خدمات مميزة.'],


            ['key' => 'footer_social_facebook', 'value' => 'https://facebook.com'],
            ['key' => 'footer_social_twitter', 'value' => 'https://twitter.com'],
            ['key' => 'footer_social_instagram', 'value' => 'https://instagram.com'],

            // About Us
            ['key' => 'about_us_ar', 'value' => '<p class="text-justify">نحن شركة تهتم بتقديم أفضل الخدمات لعملائنا. نسعى جاهدين لتحقيق أعلى معايير الجودة والابتكار في جميع مشاريعنا.</p>'],
            ['key' => 'about_us_en', 'value' => '<p class="text-justify">We are a company dedicated to providing the best services to our clients. We strive to achieve the highest standards of quality and innovation in all of our projects.</p>'],

            // Vision
            ['key' => 'vision_image', 'value' => 'path/to/vision-image.jpg'],
            ['key' => 'vision_ar', 'value' => '<h2 class="text-center">رؤيتنا</h2><p>نطمح لأن نكون الرواد في مجالنا، من خلال تقديم حلول مبتكرة وفعّالة.</p>'],
            ['key' => 'vision_en', 'value' => '<h2 class="text-center">Our Vision</h2><p>We aim to be the leaders in our field by providing innovative and effective solutions.</p>'],
            ['key' => 'vision_body_ar', 'value' => '<p class="text-justify">من خلال التزامنا بالجودة والابتكار، نهدف إلى تحسين تجربة عملائنا وتحقيق نجاح مشترك.</p>'],
            ['key' => 'vision_body_en', 'value' => '<p class="text-justify">Through our commitment to quality and innovation, we aim to enhance our clients\' experience and achieve mutual success.</p>'],

            // Values
            ['key' => 'values_image', 'value' => 'path/to/values-image.jpg'],
            ['key' => 'values_ar', 'value' => '<h2 class="text-center">قيمنا</h2><p>نؤمن بأن الجودة والابتكار هما الأساس في جميع أعمالنا. نحن نؤمن بأهمية الشفافية والمسؤولية.</p>'],
            ['key' => 'values_en', 'value' => '<h2 class="text-center">Our Values</h2><p>We believe that quality and innovation are the foundation of all our work. We value transparency and responsibility.</p>'],
            ['key' => 'values_body_ar', 'value' => '<p class="text-justify">نلتزم بتقديم حلول تحقق نتائج ملموسة لعملائنا وتعزز نجاحهم في السوق.</p>'],
            ['key' => 'values_body_en', 'value' => '<p class="text-justify">We are committed to delivering solutions that produce tangible results for our clients and enhance their success in the market.</p>'],

            // Goals
            ['key' => 'goals_image', 'value' => 'path/to/goals-image.jpg'],
            ['key' => 'goals_ar', 'value' => '<h2 class="text-center">أهدافنا</h2><p>نهدف إلى توسيع نطاق خدماتنا والوصول إلى أسواق جديدة، مع الحفاظ على جودة عالية وابتكار مستمر.</p>'],
            ['key' => 'goals_en', 'value' => '<h2 class="text-center">Our Goals</h2><p>We aim to expand our services and reach new markets, while maintaining high quality and continuous innovation.</p>'],
            ['key' => 'goals_body_ar', 'value' => '<p class="text-justify">نحن نعمل بجد لتحقيق أهدافنا من خلال تحسين العمليات الداخلية وبناء شراكات استراتيجية قوية.</p>'],
            ['key' => 'goals_body_en', 'value' => '<p class="text-justify">We are working hard to achieve our goals by improving internal processes and building strong strategic partnerships.</p>'],

            // About Us Footer
            ['key' => 'about_us_footer_ar', 'value' => '<p class="text-center text-muted">حقوق الطبع والنشر © 2024 جميع الحقوق محفوظة</p>'],
            ['key' => 'about_us_footer_en', 'value' => '<p class="text-center text-muted">Copyright © 2024 All Rights Reserved</p>'],


            ['key' => 'contact_us_en', 'value' => 'Contact Us'],
            ['key' => 'contact_us_ar', 'value' => 'اتصل بنا'],



            ['key' => 'instagram', 'value' => 'Instagram'],

            ['key' => 'twitter', 'value' => 'Twitter'],

            ['key' => 'tikTok', 'value' => 'TikTok'],

            ['key' => 'linkedIn', 'value' => 'LinkedIn'],

            ['key' => 'snapchat', 'value' => 'Snapchat'],

            ['key' => 'youTube', 'value' => 'YouTube'],

            ['key' => 'whatsApp', 'value' => 'WhatsApp'],

            ['key' => 'email', 'value' => 'Email'],

            ['key' => 'contact_us_footer_en', 'value' => 'Contact us at the footer'],
            ['key' => 'contact_us_footer_ar', 'value' => 'اتصل بنا في التذييل'],
            ['key' => 'lat', 'value' => '23.8859'], // Latitude for Saudi Arabia
            ['key' => 'lng', 'value' => '45.0792'], // Longitude for Saudi Arabia


            ['key' => 'promotional_message_ar', 'value' => 'انطلق معنا في رحلة سياحية تأخذك بعيدًا عن ضغوط الحياة ودونيتها اليومية، إلى عالم ساحر مليء باللحظات الجميلة وسط الطبيعة الخلابة والعالم الأثرية المدهشة. اكتشف تجربة لا تُنسى.'],
            ['key' => 'promotional_message_en', 'value' => 'Embark with us on a touristic journey that takes you away from the pressures and daily humiliation of life, to a magical world full of beautiful moments amidst the picturesque nature and the amazing archaeological world. Discover an unforgettable experience.'],
            ['key' => 'hero_image', 'value' => 'hero.png'],
            ['key' => 'hero_video_link', 'value' => 'https://www.youtube.com/embed/XrM5Y5ghEHQ']


        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
