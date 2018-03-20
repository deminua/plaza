<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

	protected $table = 'posts';

    protected $fillable = [
		'name', 
		'description', 
		'content', 
		'confirmed',
		'category_id',
        'store_id',
        'created_at',
        'youtube'
    ];

    public function sliders()
    {
        return $this->morphMany('App\Slider', 'rowgable');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imagegable');
    }

    public function avatar()
    {
        return $this->morphMany('App\Image', 'imagegable')->where('avatar', true);
    }

     public function avatars()
    {
        return $this->morphMany('App\Image', 'imagegable')->where('avatar', true);
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i');
    }

    //formCreatedAtAttribute
    public function setCreatedAtAttribute($value)
    {
        return $this->attributes['created_at'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
