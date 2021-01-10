<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Shared\Pivots;


use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Shared\Traits\UsesUUID;

class BasePivot extends Pivot
{
    use UsesUUID;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
}
