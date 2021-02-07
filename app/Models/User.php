<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Modules\Library\Models\Resource;
use Modules\Library\Models\Role;
use Modules\Shared\Pivots\BaseMorphPivot;
use Modules\Shared\Pivots\BasePivot;
use Modules\Shared\Traits\UsesUUID;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use UsesUUID;
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class, 'created_by');
    }

    public function favouriteResources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class, 'favourite_resources')->using(BasePivot::class)->withTimestamps();
    }

    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'roleable')
            ->using(BaseMorphPivot::class)
            ->withTimestamps();
    }

    public function isAdmin(): bool
    {
        return null !== $this->roles()->where('name', 'admin')->first();
    }

    public function hasAnyRole($roles): bool
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role): bool
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
