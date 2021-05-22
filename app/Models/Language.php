<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;


    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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

    public function categories()
    {
        return $this->hasMany(Category::class)->orderBy('created_at', 'DESC');
    }
}
