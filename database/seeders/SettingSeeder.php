<?php

namespace Database\Seeders;

use App\Models\Models\Setting;
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


        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
