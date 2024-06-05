<?php

namespace Database\Factories;

use App\Models\Procedure;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcedureFactory extends Factory
{
    protected $model = Procedure::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Procedure $procedure) {
            $tags = \App\Models\Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $procedure->tags()->attach($tags);
        });
    }
}

