<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

    protected $fillable = [
		'name', 
		'description', 
		'content', 
		'confirmed',
		'category_id',
        'store_id',
        'created_at'
    ];

    // public function tags()
    // {
    //     return $this->morphToMany('App\Slider', 'rowgable');
    // }

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

    public function formCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

}
