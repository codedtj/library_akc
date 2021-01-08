<?php


namespace Modules\Shared\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\UsesUUID;
use Wildside\Userstamps\Userstamps;

/**
 * @property User creator
 */
class BaseModel extends Model
{
    use UsesUUID;
    use Userstamps;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
    protected $guarded = [];
}
