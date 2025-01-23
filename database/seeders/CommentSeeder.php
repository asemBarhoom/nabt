<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // جلب جميع المنشورات
        $posts = Post::all();

        // تحقق من وجود منشورات ومستخدمين
        if ($posts->isEmpty()) {
            $this->command->warn('No posts found. Please create posts first.');
            return;
        }

        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('No users found. Please create users first.');
            return;
        }

        // إضافة تعليقات لكل منشور
        foreach ($posts as $post) {
            // إنشاء عدد عشوائي من التعليقات (بين 5 إلى 10)
            $commentCount = rand(5, 10);

            for ($i = 0; $i < $commentCount; $i++) {
                Comment::create([
                                    'post_id' => $post->id,
                                    'user_id' => $users->random()->id, // اختيار مستخدم عشوائي
                                    'body' => fake()->sentence(rand(10, 20)), // جملة عشوائية
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
            }
        }

        $this->command->info('Comments have been successfully seeded.');
    }
}
