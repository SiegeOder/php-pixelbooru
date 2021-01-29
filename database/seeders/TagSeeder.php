<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $posts = Post::get();
        foreach ($posts as $post)
        {
            Tag::factory()->hasAttached($post)->count(10)->create();
        }
    }

}
