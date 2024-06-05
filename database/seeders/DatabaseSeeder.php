<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Procedure;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Category::factory(5)->create();
        Tag::factory(10)->create();

        Procedure::factory(50)->create();
    }
}

