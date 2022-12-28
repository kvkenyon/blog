<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $family_category = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);
        $work_category = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
        $general_category = Category::create([
            'name' => 'General',
            'slug' => 'general',
        ]);

        $body = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut diam quam nulla porttitor massa. Libero id faucibus nisl tincidunt eget nullam non. Consectetur libero id faucibus nisl. Dolor purus non enim praesent elementum facilisis leo. Sem nulla pharetra diam sit. Mauris pharetra et ultrices neque ornare aenean euismod elementum. Adipiscing diam donec adipiscing tristique. Donec ac odio tempor orci dapibus ultrices in iaculis. Purus in mollis nunc sed id semper. Diam volutpat commodo sed egestas egestas. Iaculis urna id volutpat lacus laoreet. Eu facilisis sed odio morbi quis commodo odio. Etiam erat velit scelerisque in dictum non. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Aliquet lectus proin nibh nisl condimentum. Vitae turpis massa sed elementum tempus egestas sed sed risus. Aliquam purus sit amet luctus venenatis. Urna nec tincidunt praesent semper feugiat nibh. Pharetra vel turpis nunc eget lorem dolor sed.</p>';
        $excerpt = 'Lorem ipsum dolar sit amet.';

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family_category->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => $excerpt,
            'body' => $body,
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work_category->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => $excerpt,
            'body' => $body,
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $general_category->id,
            'title' => 'My General Post',
            'slug' => 'my-general-post',
            'excerpt' => $excerpt,
            'body' => $body,
        ]);
    }
}
