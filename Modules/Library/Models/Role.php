<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Shared\Models\BaseModel;
use Modules\Shared\Pivots\BaseMorphPivot;

class Role extends BaseModel
{
    protected static function boot()
    {
        parent::boot();

        Relation::morphMap([
            'resource' => 'Modules\Library\Models\Resource',
            'user' => 'App\Models\User'
        ]);
    }

    public function  scopePublic(Builder $query): Builder
    {
        return $query->whereNotIn('name', [
            'admin', 'editor', 'moderator'
        ]);
    }

    /**
     * Get all of the resources with current role.
     */
    public function resources()
    {
        return $this->morphedByMany(Resource::class, 'roleable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }
}
