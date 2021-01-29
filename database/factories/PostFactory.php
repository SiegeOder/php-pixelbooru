<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'image' => 'test/fakes/posts/'.$this->faker->image(
                'public/storage/test/fakes/posts',
                128,
                128,
                null,
                false),
        ];
    }
}
