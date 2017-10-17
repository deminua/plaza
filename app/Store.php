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


    public function images()
    {
        return $this->morphMany('App\Image', 'imagegable');
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

}
