<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	protected $table = 'stores';

    protected $fillable = [
		'name', 
		'description', 
		'content', 
		'floor_id',
		'shop_id',
		'confirmed'
    ];

    public function sliders()
    {
        return $this->morphMany('App\Slider', 'rowgable');
    }
    
    public function images()
    {
        return $this->morphMany('App\Image', 'imagegable');
    }
    
    public function gallery()
    {
        return $this->morphMany('App\Image', 'imagegable')->where('avatar', false);
    }

    public function avatar()
    {
        return $this->morphMany('App\Image', 'imagegable')->where('avatar', true);
    }

    public function floor()
    {
        return $this->belongsTo('App\Floor');
    }
    
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function news()
    {
        return $this->hasMany('App\Post')->where('confirmed', true)->where('category_id', 2)->limit(4)->orderby('created_at', 'desc');
    }

}
