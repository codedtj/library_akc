<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\TagManager\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\TagManager\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Класс 1',
            'Класс 2',
            'Класс 3',
            'Класс 4',
            'Класс 5',
            'Класс 6',
            'Класс 7',
            'Класс 8',
            'Класс 9',
            'Класс 10',
            'Класс 11',
        ];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
