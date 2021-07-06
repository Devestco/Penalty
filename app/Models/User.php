<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'avatar',
        'name',
        'phone',
        'email',
        'password',
        'gender',
        'banned',
        'last_ip',
        'last_session_id',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    protected function getAvatarAttribute()
    {
        $file = $this->getMedia("avatars")->first();
        if ($file) {
            return $this->getMedia("avatars")->first()->getFullUrl('thumb');
        }
        if ($this->attributes['gender']=='female'){
            return asset('media/images/default-female.png');
        }else{
            return asset('media/images/default-male.jpeg');
        }
    }

    protected function setAvatarAttribute($image)
    {
        FileService::upload($image, $this, "avatars", true);
    }

    public function getAllPermissionsAttribute(): array
    {
        $res = [];
        $allPermissions = $this->getAllPermissions();
        foreach ($allPermissions as $p) {
            $res[] = $p->name;
        }
        return $res;
    }

    public function getRoleArabicName(): string
    {
        $role = $this->roles()->first();
        return $role->name ?? '';
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
