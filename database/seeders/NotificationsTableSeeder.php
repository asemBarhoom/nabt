<?php

namespace Database\Seeders;

use App\Helpers\FileHelper;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()->get();
        foreach ($users as $user)
        {
            DB::table('notifications')->insert([
                                                   [
                                                       'id' => (string) Str::uuid(), // إنشاء UUID فريد
                                                       'type' => 'App\Notifications\Booking', // نوع الإشعار (مثال)
                                                       'notifiable_type' => 'App\Models\User', // نوع النموذج الذي يستقبل الإشعار
                                                       'notifiable_id' => $user->id, // مثال على معرف المستخدم
                                                       'data' => json_encode([
                                                                                 'image' => FileHelper::getFullPathSingleAsset('post2.png'),
                                                                                 'title' => 'أهلاً بك في موقع نبط السياحي!',
                                                                                 'message' => 'استمتع بخدماتنا وتصفح المزيد عن الوجهات السياحية.',
                                                                                 'url' => 'https://nabatsite.com/dashboard',
                                                                             ]), // بيانات الإشعار بصيغة JSON
                                                       'read_at' => null, // الإشعار غير مقروء
                                                       'created_at' => Carbon::now(), // تاريخ الإنشاء
                                                       'updated_at' => Carbon::now(), // تاريخ التحديث
                                                   ],
                                                   [
                                                       'id' => (string) Str::uuid(),
                                                       'type' => 'App\Notifications\Booking',
                                                       'notifiable_type' => 'App\Models\User',
                                                       'notifiable_id' =>  $user->id,
                                                       'data' => json_encode([
                                                                                 'image' => FileHelper::getFullPathSingleAsset('post2.png'),
                                                                                 'title' => 'مرحبا بك!',
                                                                                 'message' => 'اشترك الآن لاستكشاف المزيد من العروض السياحية.',
                                                                                 'url' => 'https://nabatsite.com/offers',
                                                                             ]),
                                                       'read_at' => null,
                                                       'created_at' => Carbon::now(),
                                                       'updated_at' => Carbon::now(),
                                                   ],
                                               ]);
        }

    }
}
