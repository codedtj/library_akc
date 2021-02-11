<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\Library\Models\Grade;

class GradeSeeder extends Seeder
{
    public function run(){
        for($i = 0; $i < 12; $i++){
            Grade::create(['name' => $i]);
        }
    }
}
