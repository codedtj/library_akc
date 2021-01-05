<?php

namespace Modules\TagManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Library\Models\Resource;
use Modules\Shared\Models\BaseModel;
use Modules\Shared\Models\BaseMorphPivot;

class Tag extends BaseModel
{
    protected static function boot()
    {
        parent::boot();

        Relation::morphMap([
            'resource' => 'Modules\Library\Models\Resource'
        ]);
    }

    /**
     * Get all of the resources that are assigned this tag.
     */
    public function resources()
    {
        return $this->morphedByMany(Resource::class, 'taggable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }
}
