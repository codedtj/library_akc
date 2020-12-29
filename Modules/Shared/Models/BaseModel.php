<?php


namespace Modules\Shared\Models;


use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\UsesUUID;
use Wildside\Userstamps\Userstamps;

class BaseModel extends Model
{
    use UsesUUID;
    use Userstamps;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
    protected $guarded = [];
}
