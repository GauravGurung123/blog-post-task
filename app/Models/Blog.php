<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable=[
        'user_id',
        'name',
        'description',
        'slug',
        'status',
    ];

    
    public function getRouteKeyName()
    {
     return 'slug';   
    }
        
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
