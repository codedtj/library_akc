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
            'Искусство',
            'Культура',
            'Самообразование',
            'Программирование',
            'Литература',
            'Английский язык',
            'Математика',
            'Физика',
            'Социология'
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
