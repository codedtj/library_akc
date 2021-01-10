<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Shared\Pivots;


use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Shared\Traits\UsesUUID;

class BaseMorphPivot extends MorphPivot
{
    use UsesUUID;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
}
