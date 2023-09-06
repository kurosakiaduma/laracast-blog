<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name'=>"Personal",
            'slug'=>"personal"
        ]);

        Category::create([
            'name'=>"Work",
            'slug'=>"work"
        ]);

        Category::create([
            'name'=>"Hobby",
            'slug'=>"hobby"
        ]);

        Post::create([
            'category_id'=>'1',
            'user_id'=>'1',
            'title'=>'My First Story',
            'excerpt'=>'Excerpt for the first story',
            'body'=>'<p>Lorem ipsum dolar sit amet</p>',
            'slug'=>'my-first-post',
        ]);


        Post::create([
            'category_id'=>'1',
            'user_id'=>'2',
            'title'=>'My Second Story',
            'excerpt'=>'Excerpt for the second story',
            'body'=>'<p>Lorem ipsum dolar sit amet</p>',
            'slug'=>'my-second-post',
        ]);


        Post::create([
            'category_id'=>'2',
            'user_id'=>'1',
            'title'=>'My Hobby Story',
            'excerpt'=>'Excerpt for the hobby story',
            'body'=>'<p>Lorem ipsum dolar sit amet</p>',
            'slug'=>'my-hobby-post',
        ]);


        Post::create([
            'category_id'=>'3',
            'user_id'=>'2',
            'title'=>'My Fourth Story',
            'excerpt'=>'Excerpt for the second story',
            'body'=>'<p>Lorem ipsum dolar sit amet</p>',
            'slug'=>'my-fourth-post',
        ]);


        Post::create([
            'category_id'=>'2',
            'user_id'=>'3',
            'title'=>'My Work Story',
            'excerpt'=>'Excerpt for the work story',
            'body'=>'<p>Lorem ipsum dolar sit amet</p>',
            'slug'=>'my-worker-post',
        ]);
    }
}
