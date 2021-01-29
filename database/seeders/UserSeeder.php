<?php


namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(3)
            ->has(Post::factory()->count(3)
                ->has(Comment::factory()->count(3)))
            ->create();
    }
}
