<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	protected $table = 'sliders';

    protected $fillable = [
		'name', 
		'url', 
		'filename', 
		'filesize', 
    ];

    public function rowgable()
    {
        return $this->morphTo();
    }

}
