<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\BaseModel;

class Theme extends BaseModel
{
    use SoftDeletes;
}
