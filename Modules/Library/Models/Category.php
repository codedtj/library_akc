<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\BaseModel;

/**
 * @property mixed name
 */
class Category extends BaseModel
{
    use SoftDeletes;

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
