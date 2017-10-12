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
		#'confirmed'
    ];
}
