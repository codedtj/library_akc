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
            "Физика",
            "Математика",
            "Химия",
            "География",
            "Забони англисӣ",
            "Забони тоҷикӣ",
            'Забони русӣ',
            'Биология',
            'Санъат',
            'Таърихи халқи тоҷик',
            'Таърихи ҷаҳон',
            'Адабиёти тоҷик',
            'Адабиёти ҷаҳон',
            'Технологияи информатсионӣ',
            'Иқтисод',
            'Менеҷмент',
            'Табиатшиносӣ',
            'Ҳуқуқ',
            'Хониш',
            'Технологияи меҳнат',
            'Тарбияи ҷисмонӣ',
            'Дигарҳо'
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
