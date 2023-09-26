<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Image;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;


class PostSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crea la carpeta segun en donde especifique la url, Model Image
        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');

        Category::factory()->count(3)->create();
        Tag::factory()->count(6)->create();
        //Post::factory()->count(20)->create();

        $posts = Post::factory()->count(20)->create();

        foreach($posts as $post)
        {
            Image::factory(1)->create([
                
                'imageable_id' => $post -> id,
                'imageable_type' => Post::class
                
            ]);
        }
        $post->tags()->attach([
            rand(1,4),
            rand(5,8)
        ]);
    }
}
//php artisan db:seed --class=Modules\\Blog\\Database\\Seeders\\PostSeederTableSeeder