<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;
use App\Shop;
use App\Floor;
use App\Post;

class StoreController extends Controller
{
    public function index()
    {
    	$meta = [
    		'title'=>'Каталог магазинов'
    	];

		$stores = Store::with('avatar', 'posts')->where('confirmed', true)->get()->sortBy(function($stores)
		{
		    return $stores->posts->count();
		}, SORT_REGULAR, true);

		#dd($stores);

        #$stores = Store::with('avatar')->where('confirmed', true)->get();
        $shops = Shop::get();
        $floors = Floor::get();
#with('store')->

        #$collection = collect($stores);
        #dd($collection[1]->groupBy('floor_id'));
        #array_walk($stores, 'collect');
        #array_walk($collection, 'collect');
        #dd($collection);
        #$grouped = $collection->groupBy('floor_id');
        #$grouped->all();
        #$grouped2 = $collection->groupBy('floor_id');
        #dd($grouped);
       return view('store.index', compact('meta', 'stores', 'shops', 'floors'));
    }
}
