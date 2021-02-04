<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\Library\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        collect([
            'teacher',
            'manager',
            'methodologist',
            'librarian',
            'student',
            'parent',
            'editor',
            'moderator',
            'admin'
        ])->each(function ($name) {
            Role::create(['name' => $name]);
        });
    }
}
