<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Modules\FileManager\Models\BaseFile;
use Modules\ImageGallery\Models\Image;
use Modules\Shared\Models\BaseModel;
use Modules\Shared\Pivots\BaseMorphPivot;
use Modules\Shared\Pivots\BasePivot;
use Modules\TagManager\Models\Tag;

/**
 * @property Image cover
 * @property BaseFile file
 * @property String id
 * @property String file_id
 * @property String created_by
 */
class Resource extends BaseModel
{

    use SoftDeletes;

    protected $casts = [
        'is_public' => 'boolean'
    ];

    protected static function booted()
    {
        static::addGlobalScope('public', function (Builder $query) {
            $query->where('is_public', true);
        });
    }

    public function resolveRouteBinding($value, $field = null): ?Model
    {
        return Resource::withoutGlobalScope('public')->with('tags', 'category')->findOrFail($value);
    }

    /**
     * Get resource file.
     */
    public function file(): BelongsTo
    {
        return $this->belongsTo(BaseFile::class, 'file_id');
    }

    /**
     * Get resource cover
     */
    public function cover(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }

    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'roleable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favourite_resources')->using(BasePivot::class)->withTimestamps();
    }

    public function getIsEditableAttribute(): bool
    {
        return $this->creator->isAdmin() || $this->creator->is(Auth::user()) && $this->creator->hasRole('editor');
    }

    public function getIsFavouriteAttribute(): bool
    {
        return \auth()->user() ? (bool)\auth()->user()->favouriteResources()->find($this->id) : false;
    }
}
