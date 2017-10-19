<?php

namespace App;

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
		'store_id'
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

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}