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
            'Сайёҳат',
            'Ғизо',
            'Оила',
            'Табиат',
            'Муҳандисӣ',
            'Саломатӣ',
            'Варзиш',
            'Ҳайвонот',
            'Кайҳон',
            'Тарзи ҳаёти солим',
            'Равоншиносӣ',
            'Саргузашт',
            'Афсона',
            'Рассомӣ',
            'Дигар'
        ];

        foreach ($themes as $name) {
            Theme::create(['name' => $name]);
        }
    }
}
