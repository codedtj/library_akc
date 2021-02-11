<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;


use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\BaseModel;
use Modules\Shared\Pivots\BaseMorphPivot;

class Grade extends BaseModel
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        Relation::morphMap([
            'resource' => 'Modules\Library\Models\Resource',
            'user' => 'App\Models\User'
        ]);
    }

    /**
     * Get all of the resources with current grade.
     */
    public function resources()
    {
        return $this->morphedByMany(Resource::class, 'gradeable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }
}
