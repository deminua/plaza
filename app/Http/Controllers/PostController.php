<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#use App\Store;
#use App\Shop;
#use App\Floor;
use App\Post;

class PostController extends Controller
{
    public function news()
    {
    	$meta = [
    		'title'=>'Новости и события'
    	];

		$news = Post::with('store', 'avatar', 'store')->where('confirmed', true)->where('category_id', 2)->orderby('created_at', 'desc')->paginate(8);
		
       return view('news.index', compact('meta', 'news'));
    }

    public function sale()
    {
    	$meta = [
    		'title'=>'Акции и скидки'
    	];

		$sales = Post::with('store', 'avatar', 'store')->where('confirmed', true)->where('category_id', 1)->orderby('created_at', 'desc')->paginate(8);
		#dd($sales);

       return view('sale.index', compact('meta', 'sales'));
    }
}
