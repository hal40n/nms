<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Procedure;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        return [
            'procedure_id' => Procedure::factory(),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
