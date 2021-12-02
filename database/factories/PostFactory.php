<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{

    public function definition()
    {
        return [
            'author_id' => rand(1, 4),
            'title' => $this->faker->realText(rand(25, 30)),
            'excerpt' => $this->faker->realText(rand(100, 120)),
            'body' => $this->faker->realText(rand(200, 300)),
            'created_at' => $this->faker->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => $this->faker->dateTimeBetween('-20 days', '-1 days'),

        ];
    }
}
