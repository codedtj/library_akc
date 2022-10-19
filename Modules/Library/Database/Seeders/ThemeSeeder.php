<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Database\Seeders;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Library\Models\Theme;

class ThemeSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $themes = [
            'travel',
            'food',
            'family',
            'nature',
            'engineering',
            'health',
            'sport',
            'animals',
            'space',
            'healthy lifestyle',
            'psychology',
            'adventure',
            'tale',
            'painting',
            'culture',
            'other'
        ];

        foreach ($themes as $name) {
            Theme::create(['name' => $name]);
        }
    }
}
