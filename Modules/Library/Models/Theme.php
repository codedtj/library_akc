<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\BaseModel;

class Theme extends BaseModel
{
    use SoftDeletes;

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }
}
