<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => ['en' => 'Post Title 1', 'ar' => 'عنوان المقال 1'],
            'body' => [
                'en' => '<p>This is a long post body with <strong>HTML tags</strong>. It includes some <a href="#">links</a>, <em>emphasis</em>, <strong>strong</strong> text, and <ul><li>list items</li><li>more items</li></ul>.</p>',
                'ar' => '<p>هذه هي نص المقال الطويل مع <strong>علامات HTML</strong>. يتضمن بعض <a href="#">الروابط</a>، <em>التأكيد</em>، نص <strong>قوي</strong>، و <ul><li>عناصر القائمة</li><li>المزيد من العناصر</li></ul>.</p>'
            ],
            'image' => 'post2.png',
            'cover_image' => 'postcover.png',
            'status' => true,
        ]);

        Post::create([
            'title' => ['en' => 'Post Title 2', 'ar' => 'عنوان المقال 2'],
            'body' => [
                'en' => '<p>This post body contains <strong>HTML</strong> elements, including <a href="#">links</a>, <em>emphasis</em>, <strong>strong</strong> elements, and <blockquote>quotes</blockquote>.</p>',
                'ar' => '<p>هذا المقال يحتوي على عناصر <strong>HTML</strong>، بما في ذلك <a href="#">الروابط</a>، <em>التأكيد</em>، عناصر <strong>قوية</strong>، و <blockquote>الاقتباسات</blockquote>.</p>'
            ],
            'image' => 'post1.png',
            'cover_image' => 'postcover.png',
            'status' => true,
        ]);

        Post::create([
            'title' => ['en' => 'Post Title 3', 'ar' => 'عنوان المقال 3'],
            'body' => [
                'en' => '<p>This is the body of post 3 with even <em>more</em> <strong>complex HTML</strong>. It contains <ul><li>lists</li><li>images</li><li>links</li></ul> and <table><tr><th>Header</th><th>Content</th></tr><tr><td>Row 1</td><td>Data 1</td></tr></table>.</p>',
                'ar' => '<p>هذا هو نص المقال 3 مع <em>المزيد</em> من <strong>HTML معقدة</strong>. يحتوي على <ul><li>القوائم</li><li>الصور</li><li>الروابط</li></ul> و <table><tr><th>عنوان</th><th>المحتوى</th></tr><tr><td>الصف 1</td><td>البيانات 1</td></tr></table>.</p>'
            ],
            'image' => 'post2.png',
            'status' => true,
        ]);

        Post::create([
            'title' => ['en' => 'Post Title 4', 'ar' => 'عنوان المقال 4'],
            'body' => [
                'en' => '<p>The body of post 4 includes <strong>HTML tags</strong> like <code>code</code>, <pre>preformatted text</pre>, and <a href="#">links</a>. There are also <em>emphasized</em> sections and <ul><li>lists</li><li>links</li></ul>.</p>',
                'ar' => '<p>نص المقال 4 يحتوي على <strong>علامات HTML</strong> مثل <code>كود</code>، <pre>نص منسق مسبقًا</pre>، و <a href="#">الروابط</a>. هناك أيضًا أقسام <em>مؤكدة</em> و <ul><li>القوائم</li><li>الروابط</li></ul>.</p>'
            ],
            'image' => 'post1.png',
            'cover_image' => 'postcover.png',
            'status' => true,
        ]);
    }
}
