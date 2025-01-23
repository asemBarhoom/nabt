<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => ['ar' => 'مواقع تاريخية', 'en' => 'Historical Sites'],
                'body' => ['ar' => 'استكشف المواقع التاريخية العريقة في العلا.', 'en' => 'Explore the ancient historical sites of Al-Ula.'],
                'image' => 'categories/historical_sites.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',
            ],
            [
                'name' => ['ar' => 'مناطق طبيعية', 'en' => 'Natural Areas'],
                'body' => ['ar' => 'استمتع بجمال الطبيعة في العلا.', 'en' => 'Enjoy the natural beauty of Al-Ula.'],
                'image' => 'categories/natural_areas.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',

            ],
            [
                'name' => ['ar' => 'مغامرات الصحراء', 'en' => 'Desert Adventures'],
                'body' => ['ar' => 'انغمس في مغامرات الصحراء الرائعة.', 'en' => 'Dive into exciting desert adventures.'],
                'image' => 'categories/desert_adventures.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'منتجعات فاخرة', 'en' => 'Luxury Resorts'],
                'body' => ['ar' => 'تمتع بإقامة فاخرة في منتجعات العلا.', 'en' => 'Enjoy luxurious stays at Al-Ula resorts.'],
                'image' => 'categories/luxury_resorts.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'فنادق بوتيكية', 'en' => 'Boutique Hotels'],
                'body' => ['ar' => 'تمتع بإقامة مريحة في الفنادق البوتيكية العلا.', 'en' => 'Enjoy a comfortable stay at Al-Ula boutique hotels.'],
                'image' => 'categories/boutique_hotels.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'الأنشطة الثقافية', 'en' => 'Cultural Activities'],
                'body' => ['ar' => 'اكتشف الأنشطة الثقافية المتنوعة في العلا.', 'en' => 'Discover the diverse cultural activities in Al-Ula.'],
                'image' => 'categories/cultural_activities.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'رحلات جوية', 'en' => 'Aerial Tours'],
                'body' => ['ar' => 'استمتع بجولات جوية مذهلة فوق العلا.', 'en' => 'Enjoy stunning aerial tours over Al-Ula.'],
                'image' => 'categories/aerial_tours.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'مواقع تصوير', 'en' => 'Filming Locations'],
                'body' => ['ar' => 'استمتع بمواقع التصوير الشهيرة في العلا.', 'en' => 'Enjoy the famous filming locations in Al-Ula.'],
                'image' => 'categories/filming_locations.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'الأنشطة الرياضية', 'en' => 'Sports Activities'],
                'body' => ['ar' => 'ممارسة الأنشطة الرياضية في العلا على أعلى مستوى.', 'en' => 'Engage in top-level sports activities in Al-Ula.'],
                'image' => 'categories/sports_activities.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'رحلات السفاري', 'en' => 'Safari Trips'],
                'body' => ['ar' => 'اكتشف مغامرات السفاري الصحراوية في العلا.', 'en' => 'Discover desert safari adventures in Al-Ula.'],
                'image' => 'categories/safari_trips.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'مهرجانات ثقافية', 'en' => 'Cultural Festivals'],
                'body' => ['ar' => 'شارك في المهرجانات الثقافية المميزة في العلا.', 'en' => 'Participate in the unique cultural festivals of Al-Ula.'],
                'image' => 'categories/cultural_festivals.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'الأنشطة العائلية', 'en' => 'Family Activities'],
                'body' => ['ar' => 'استمتع بأنشطة عائلية تناسب جميع الأعمار في العلا.', 'en' => 'Enjoy family-friendly activities for all ages in Al-Ula.'],
                'image' => 'categories/family_activities.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'جولات المدينة', 'en' => 'City Tours'],
                'body' => ['ar' => 'استكشف معالم المدينة المميزة في العلا.', 'en' => 'Explore the iconic city landmarks of Al-Ula.'],
                'image' => 'categories/city_tours.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'التراث المحلي', 'en' => 'Local Heritage'],
                'body' => ['ar' => 'استمتع بالتعرف على التراث المحلي في العلا.', 'en' => 'Enjoy learning about the local heritage of Al-Ula.'],
                'image' => 'categories/local_heritage.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'مناطق رياضية', 'en' => 'Sports Areas'],
                'body' => ['ar' => 'تمتع بمناطق رياضية حديثة في العلا.', 'en' => 'Enjoy modern sports areas in Al-Ula.'],
                'image' => 'categories/sports_areas.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'التسوق في العلا', 'en' => 'Shopping in Al-Ula'],
                'body' => ['ar' => 'اكتشف أفضل أماكن التسوق في العلا.', 'en' => 'Discover the best shopping spots in Al-Ula.'],
                'image' => 'categories/shopping_alula.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'الحدائق العامة', 'en' => 'Public Parks'],
                'body' => ['ar' => 'استمتع بالأجواء الهادئة في حدائق العلا العامة.', 'en' => 'Enjoy the peaceful ambiance of Al-Ula public parks.'],
                'image' => 'categories/public_parks.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'مطاعم فاخرة', 'en' => 'Fine Dining'],
                'body' => ['ar' => 'تناول الطعام في أفضل المطاعم الفاخرة في العلا.', 'en' => 'Dine in the finest restaurants in Al-Ula.'],
                'image' => 'categories/fine_dining.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'المغامرات الجبلية', 'en' => 'Mountain Adventures'],
                'body' => ['ar' => 'استمتع بتجارب مغامرات جبلية في العلا.', 'en' => 'Enjoy thrilling mountain adventures in Al-Ula.'],
                'image' => 'categories/mountain_adventures.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
            [
                'name' => ['ar' => 'حجز رحلات', 'en' => 'Trip Booking'],
                'body' => ['ar' => 'احجز رحلاتك السياحية بكل سهولة في العلا.', 'en' => 'Book your tours easily in Al-Ula.'],
                'image' => 'categories/trip_booking.jpg',
                'status' => true,
                'categoriable_type' => 'App\Models\Destination',


            ],
                 [
                    'name' => ['ar' => 'حجز رحلات', 'en' => 'Trip Booking'],
                    'body' => ['ar' => 'احجز رحلاتك السياحية بكل سهولة في العلا.', 'en' => 'Book your tours easily in Al-Ula.'],
                    'image' => 'categories/trip_booking.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'الإلغاءات', 'en' => 'Cancellations'],
                    'body' => ['ar' => 'تعرف على سياسة الإلغاء في رحلاتنا.', 'en' => 'Learn about our cancellation policy for trips.'],
                    'image' => 'categories/cancellations.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'الدفع', 'en' => 'Payment'],
                    'body' => ['ar' => 'طرق الدفع المتاحة لتأكيد حجوزاتك.', 'en' => 'Available payment methods to confirm your bookings.'],
                    'image' => 'categories/payment.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'الأسئلة المتكررة', 'en' => 'Frequently Asked Questions'],
                    'body' => ['ar' => 'إجابة على أكثر الأسئلة شيوعاً حول الرحلات.', 'en' => 'Answers to the most common questions about trips.'],
                    'image' => 'categories/faq.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'الرحلات الخاصة', 'en' => 'Private Tours'],
                    'body' => ['ar' => 'اكتشف الرحلات الخاصة التي نقدمها.', 'en' => 'Discover the private tours we offer.'],
                    'image' => 'categories/private_tours.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'التغييرات في الحجز', 'en' => 'Booking Modifications'],
                    'body' => ['ar' => 'كيفية تعديل حجزك إذا لزم الأمر.', 'en' => 'How to modify your booking if necessary.'],
                    'image' => 'categories/booking_modifications.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'السفر إلى العلا', 'en' => 'Travel to Al-Ula'],
                    'body' => ['ar' => 'معلومات حول السفر إلى العلا وكيفية الوصول إليها.', 'en' => 'Information about traveling to Al-Ula and how to get there.'],
                    'image' => 'categories/travel_to_ula.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'الأنشطة السياحية', 'en' => 'Tourist Activities'],
                    'body' => ['ar' => 'تعرف على الأنشطة السياحية المتاحة في العلا.', 'en' => 'Learn about the tourist activities available in Al-Ula.'],
                    'image' => 'categories/tourist_activities.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'الإقامة', 'en' => 'Accommodation'],
                    'body' => ['ar' => 'خيارات الإقامة المتاحة في العلا.', 'en' => 'Accommodation options available in Al-Ula.'],
                    'image' => 'categories/accommodation.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',
                ],
                [
                    'name' => ['ar' => 'الطقس في العلا', 'en' => 'Weather in Al-Ula'],
                    'body' => ['ar' => 'معلومات حول الطقس في العلا طوال العام.', 'en' => 'Information about the weather in Al-Ula throughout the year.'],
                    'image' => 'categories/weather_ula.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Faq',],

                [
                    'name' => ['ar' => 'سياسة الإلغاء العامة', 'en' => 'General Cancellation Policy'],
                    'body' => ['ar' => 'يمكن للعملاء إلغاء الحجز في أي وقت قبل موعد الرحلة بمدة لا تقل عن 24 ساعة للحصول على استرداد كامل.', 'en' => 'Customers can cancel bookings at any time at least 24 hours before the trip for a full refund.'],
                    'image' => 'categories/cancellations1.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'الإلغاء خلال 48 ساعة', 'en' => 'Cancellation within 48 Hours'],
                    'body' => ['ar' => 'إذا تم الإلغاء قبل 48 ساعة من الرحلة، سيتم خصم 20% من المبلغ المدفوع كرسوم إلغاء.', 'en' => 'If the cancellation is made within 48 hours of the trip, a 20% cancellation fee will be deducted from the paid amount.'],
                    'image' => 'categories/cancellations2.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'الإلغاء بسبب الطقس', 'en' => 'Cancellation Due to Weather'],
                    'body' => ['ar' => 'في حالة الطقس السيئ، سيتم إلغاء الرحلات وتعويض العملاء بالكامل.', 'en' => 'In case of bad weather, trips will be cancelled and customers will be fully refunded.'],
                    'image' => 'categories/cancellations3.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'إلغاء الرحلات الخاصة', 'en' => 'Private Trip Cancellations'],
                    'body' => ['ar' => 'يمكن للعملاء إلغاء الرحلات الخاصة قبل 72 ساعة من الموعد المحدد، مع خصم 10% من المبلغ المدفوع كرسوم إلغاء.', 'en' => 'Customers can cancel private trips up to 72 hours before the scheduled time, with a 10% cancellation fee.'],
                    'image' => 'categories/cancellations4.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'الإلغاء بسبب الطوارئ', 'en' => 'Cancellation Due to Emergencies'],
                    'body' => ['ar' => 'في حالات الطوارئ، يمكن للعملاء إلغاء الحجز مع تقديم المستندات المطلوبة، وسيتم تعويضهم بالكامل.', 'en' => 'In emergencies, customers can cancel their booking with the required documentation and will be fully refunded.'],
                    'image' => 'categories/cancellations5.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'إلغاء الحجز بعد الدفع', 'en' => 'Cancellation After Payment'],
                    'body' => ['ar' => 'إذا تم الدفع ولم يتم الإلغاء في الوقت المناسب، فقد لا يتم تعويض العميل وفقًا لسياسة الإلغاء الخاصة بنا.', 'en' => 'If payment is made and cancellation is not done within the allowed time, the customer may not be refunded according to our cancellation policy.'],
                    'image' => 'categories/cancellations6.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'الإلغاء للرحلات الدولية', 'en' => 'International Trip Cancellations'],
                    'body' => ['ar' => 'بالنسبة للرحلات الدولية، يجب على العملاء إلغاء الحجز قبل أسبوعين من تاريخ الرحلة للحصول على استرداد كامل.', 'en' => 'For international trips, customers must cancel the booking at least two weeks before the trip date to receive a full refund.'],
                    'image' => 'categories/cancellations7.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'إلغاء الحجز للأعضاء المميزين', 'en' => 'Premium Member Cancellations'],
                    'body' => ['ar' => 'يتمتع الأعضاء المميزون بمرونة أكبر في سياسة الإلغاء، حيث يمكنهم إلغاء الحجوزات في أي وقت قبل 12 ساعة من الرحلة للحصول على استرداد جزئي.', 'en' => 'Premium members enjoy greater flexibility in the cancellation policy, allowing cancellations up to 12 hours before the trip for a partial refund.'],
                    'image' => 'categories/cancellations8.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'إلغاء الحجوزات للمجموعات', 'en' => 'Group Booking Cancellations'],
                    'body' => ['ar' => 'لحجوزات المجموعات، يتم تطبيق رسوم إلغاء بنسبة 15% إذا تم الإلغاء قبل 5 أيام من الرحلة.', 'en' => 'For group bookings, a 15% cancellation fee applies if cancelled at least 5 days before the trip.'],
                    'image' => 'categories/cancellations9.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],
                [
                    'name' => ['ar' => 'إلغاء بسبب الحجز المزدوج', 'en' => 'Cancellation Due to Double Booking'],
                    'body' => ['ar' => 'في حالة حدوث حجز مزدوج، سنقوم بإلغاء الحجز المكرر وإبلاغ العميل في أقرب وقت، مع تقديم استرداد كامل.', 'en' => 'In case of double booking, we will cancel the duplicate booking and notify the customer promptly, offering a full refund.'],
                    'image' => 'categories/cancellations10.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Cancellation',
                ],

                [
                    'name' => ['ar' => 'إلغاء بسبب الحجز المزدوج', 'en' => 'Cancellation Due to Double Booking'],
                    'body' => ['ar' => 'في حالة حدوث حجز مزدوج، سنقوم بإلغاء الحجز المكرر وإبلاغ العميل في أقرب وقت، مع تقديم استرداد كامل.', 'en' => 'In case of double booking, we will cancel the duplicate booking and notify the customer promptly, offering a full refund.'],
                    'image' => 'categories/cancellations10.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'تأخير في الرحلة', 'en' => 'Flight Delay'],
                    'body' => ['ar' => 'في حالة تأخير الرحلة، سنقوم بتوفير خيارات بديلة للعملاء وإبلاغهم بالتفاصيل في أسرع وقت.', 'en' => 'In case of flight delay, we will provide alternative options for customers and notify them promptly with details.'],
                    'image' => 'categories/delays1.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'حجز مفقود', 'en' => 'Lost Booking'],
                    'body' => ['ar' => 'في حال فقدان الحجز، سنتحقق من التفاصيل ونساعد العميل في استعادة الحجز بأسرع وقت ممكن.', 'en' => 'In case of lost booking, we will verify details and assist the customer in retrieving their booking promptly.'],
                    'image' => 'categories/lost_bookings2.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'إلغاء بسبب الطقس السيئ', 'en' => 'Cancellation Due to Bad Weather'],
                    'body' => ['ar' => 'في حال حدوث ظروف جوية غير مواتية، سنقوم بإلغاء الحجز وتقديم تعويض للعملاء إذا لزم الأمر.', 'en' => 'In case of unfavorable weather conditions, we will cancel the booking and provide compensation if necessary.'],
                    'image' => 'categories/weather_cancellations3.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'تغيير في الجدول الزمني', 'en' => 'Schedule Change'],
                    'body' => ['ar' => 'في حالة تغيير الجدول الزمني للرحلة أو الخدمة، سيتم إبلاغ العملاء بالتغييرات وأي خيارات بديلة متاحة.', 'en' => 'In case of a schedule change for a flight or service, customers will be notified of the changes and any alternative options available.'],
                    'image' => 'categories/schedule_changes4.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'إلغاء بسبب ظروف الطوارئ', 'en' => 'Cancellation Due to Emergency'],
                    'body' => ['ar' => 'في حالة حدوث ظروف طارئة، سيتم إلغاء الحجز وسيتم تقديم خيارات تعويض للعملاء. نتمنى لكم السلامة.', 'en' => 'In case of an emergency, the booking will be canceled, and compensation options will be provided to the customers. We wish you safety.'],
                    'image' => 'categories/emergency_cancellations5.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'تأجيل بسبب الظروف الاستثنائية', 'en' => 'Postponement Due to Exceptional Circumstances'],
                    'body' => ['ar' => 'في حالة تأجيل الرحلة أو الخدمة بسبب ظروف استثنائية، سنوافي العملاء بكل التفاصيل والتحديثات المتاحة.', 'en' => 'In case of postponement due to exceptional circumstances, customers will be updated with all details and available updates.'],
                    'image' => 'categories/postponements6.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'مشكلة في الدفع', 'en' => 'Payment Issues'],
                    'body' => ['ar' => 'في حال حدوث مشكلة في الدفع، سيتم مساعدة العملاء في حل المشكلة بأسرع وقت ممكن لاستكمال الحجز.', 'en' => 'In case of payment issues, we will assist the customers in resolving the issue as quickly as possible to complete their booking.'],
                    'image' => 'categories/payment_issues7.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'تغيير في المقعد', 'en' => 'Seat Change'],
                    'body' => ['ar' => 'في حال طلب تغيير المقعد، سيتم فحص التوافر والتأكيد للعملاء في أسرع وقت.', 'en' => 'In case of a seat change request, availability will be checked, and customers will be confirmed as soon as possible.'],
                    'image' => 'categories/seat_changes8.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],
                [
                    'name' => ['ar' => 'إلغاء بسبب الحظر', 'en' => 'Cancellation Due to Ban'],
                    'body' => ['ar' => 'في حال حدوث حظر على الخدمة أو الوجهة، سيتم إلغاء الحجز وتقديم تعويض مناسب للعملاء.', 'en' => 'In case of a ban on the service or destination, the booking will be canceled, and appropriate compensation will be offered to the customers.'],
                    'image' => 'categories/banned_cancellations9.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Ticket',
                ],

                 [
                    'name' => ['ar' => 'أخبار السفر', 'en' => 'Travel News'],
                    'body' => ['ar' => 'آخر التحديثات والأخبار المتعلقة بالسفر حول العالم.', 'en' => 'The latest updates and news about travel worldwide.'],
                    'image' => 'categories/travel_news.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'نصائح السفر', 'en' => 'Travel Tips'],
                    'body' => ['ar' => 'أفضل النصائح لجعل تجربتك في السفر مريحة وسلسة.', 'en' => 'The best tips to make your travel experience smooth and comfortable.'],
                    'image' => 'categories/travel_tips.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'وجهات سياحية', 'en' => 'Tourist Destinations'],
                    'body' => ['ar' => 'اكتشف أجمل الوجهات السياحية في العالم.', 'en' => 'Discover the most beautiful tourist destinations in the world.'],
                    'image' => 'categories/tourist_destinations.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'ثقافات وعادات', 'en' => 'Cultures and Traditions'],
                    'body' => ['ar' => 'تعرف على الثقافات والعادات المختلفة حول العالم.', 'en' => 'Learn about different cultures and traditions around the world.'],
                    'image' => 'categories/cultures_traditions.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'مطاعم ومأكولات', 'en' => 'Food and Restaurants'],
                    'body' => ['ar' => 'استمتع بتجارب تناول الطعام في أفضل المطاعم العالمية.', 'en' => 'Enjoy dining experiences in the best international restaurants.'],
                    'image' => 'categories/food_restaurants.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'الأنشطة والمغامرات', 'en' => 'Activities and Adventures'],
                    'body' => ['ar' => 'استمتع بأروع الأنشطة والمغامرات في وجهاتك.', 'en' => 'Enjoy the best activities and adventures at your destinations.'],
                    'image' => 'categories/activities_adventures.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'إرشادات السفر', 'en' => 'Travel Guidelines'],
                    'body' => ['ar' => 'إرشادات وقوانين السفر في مختلف الدول.', 'en' => 'Travel guidelines and regulations in different countries.'],
                    'image' => 'categories/travel_guidelines.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'السفر الاقتصادي', 'en' => 'Budget Travel'],
                    'body' => ['ar' => 'دليلك للسفر الاقتصادي بتكاليف منخفضة.', 'en' => 'Your guide to budget travel at low costs.'],
                    'image' => 'categories/budget_travel.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'السفر الفاخر', 'en' => 'Luxury Travel'],
                    'body' => ['ar' => 'أفضل تجارب السفر الفاخرة حول العالم.', 'en' => 'The best luxury travel experiences around the world.'],
                    'image' => 'categories/luxury_travel.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],
                [
                    'name' => ['ar' => 'أخبار العروض', 'en' => 'Deals and Offers'],
                    'body' => ['ar' => 'احصل على أحدث العروض والخصومات للسفر.', 'en' => 'Get the latest travel deals and discounts.'],
                    'image' => 'categories/deals_offers.jpg',
                    'status' => true,
                    'categoriable_type' => 'App\Models\Post',
                ],





        ];


        collect($categories)->map(function ($item) {
            Category::query()->create($item);
        });
    }
}
