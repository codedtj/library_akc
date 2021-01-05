<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Shared\Models;


use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Shared\Traits\UsesUUID;

class BaseMorphPivot extends MorphPivot
{
    use UsesUUID;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
}
