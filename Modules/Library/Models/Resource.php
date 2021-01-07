<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;


use Illuminate\Database\Eloquent\Builder;
use Modules\FileManager\Models\BaseFile;
use Modules\ImageGallery\Models\Image;
use Modules\Shared\Models\BaseModel;
use Modules\Shared\Models\BaseMorphPivot;
use Modules\TagManager\Models\Tag;

class Resource extends BaseModel
{

    protected static function booted()
    {
        static::addGlobalScope('public', function (Builder $query) {
            $query->where('is_public', true);
        });
    }

    /**
     * Get resource file.
     */
    public function file()
    {
        return $this->belongsTo(BaseFile::class, 'file_id');
    }

    /**
     * Get resource cover
     */
    public function cover()
    {
        return $this->belongsTo(Image::class);
    }

    /**
     * Get all of the resource tags.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
