<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    protected $appends = [
        'avatar_url',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by');
    }

    public function updateAvatar(UploadedFile $photo)
    {
        tap($this->avatar, function ($previous) use ($photo) {
            $this->forceFill([
                'avatar' => $photo->storePublicly('', ['disk' => $this->avatarDisk()]),
            ])->save();

            if ($previous) {
                Storage::disk($this->avatarDisk())->delete($previous);
            }
        });
    }

    public function avatarDisk()
    {
        return 'avatar';
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? Storage::disk($this->avatarDisk())->url($this->avatar)
            : $this->defaultAvatar();
    }

    protected function defaultAvatar()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }
}
