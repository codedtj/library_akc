<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;


use Modules\Shared\Models\BaseModel;

/**
 * @property mixed name
 */
class Category extends BaseModel
{
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
