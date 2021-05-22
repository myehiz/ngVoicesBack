<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'password',
        'role',
        'status',
        'banned_until',
        'last_login_at',
        'last_login_timezone',
        'last_login_ip',
        'last_login_location',
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

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class)->orderBy('created_at', 'DESC');
    }

    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('created_at', 'DESC');
    }

    public function voices()
    {
        return $this->hasMany(Voice::class)->orderBy('created_at', 'DESC');
    }

    public function broadcasts()
    {
        return $this->hasMany(Broadcast::class)->orderBy('created_at', 'DESC');
    }
}
