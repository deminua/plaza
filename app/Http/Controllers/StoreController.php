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

        $shops = Shop::get();
        $floors = Floor::get();

       return view('store.index', compact('meta', 'stores', 'shops', 'floors'));
    }


    public function show($id)
    {

    	$store = Store::find($id);
    	
    	$sales = Post::with('avatar')->where('confirmed', true)->where('category_id', 1)->where('store_id', $store->id)->orderby('created_at', 'desc')->get();
        $news = Post::with('avatar', 'store', 'store.floor', 'store.shop')->where('confirmed', true)->where('category_id', 2)->where('store_id', $store->id)->orderby('created_at', 'desc')->get();

    	$meta = [
    		'title'=> $store->name,
    	];
		return view('store.show', compact('meta', 'store', 'sales', 'news'));
    }

}
