<?php

namespace Modules\Library\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Library\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $categories = [
            "physics",
            "mathematics",
            "chemistry",
            "geography",
            "english_language",
            "tajik_language",
            'russian_language',
            'biology',
            'art',
            'tajik_history',
            'world_history',
            'tajik_literature',
            'world_literature',
            'information_technology',
            'economy',
            'management',
            'science_of_nature',
            'law',
            'reading',
            'labor_technology',
            'physical_culture',
            'other'
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
