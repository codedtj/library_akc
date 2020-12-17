<?php


namespace Modules\Shared\Models;


use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\UsesUUID;

class BaseModel extends Model
{
    use UsesUUID;
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
}
