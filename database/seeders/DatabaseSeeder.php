<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Procedure;
use App\Models\Page;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         Procedure::factory()
            ->count(30)
            ->create()
            ->each(function ($procedure) {
                $procedure->pages()->createMany(
                    Page::factory()->count(10)->make()->toArray()
                );
            });
    }
}

