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
            'Путешествие',
            'Семья',
            'Еда',
            'Животные'
        ];

        foreach ($themes as $name) {
            Theme::create(['name' => $name]);
        }
    }
}
