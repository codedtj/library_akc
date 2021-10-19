<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\Library\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        collect([
            'teacher' => 'Омӯзгор',
            'educator' => 'Корманди соҳаи маориф',
//            'methodologist',
//            'librarian',
            'student' => 'Хонанда',
            'parent' => 'Волидайн',
            'editor' => 'Муҳаррир',
            'moderator' => 'Модератор',
            'admin' => 'Администратор'
        ])->each(function ($local_name, $name) {
            Role::create(['name' => $name, 'local_name' => $local_name]);
        });
    }
}
