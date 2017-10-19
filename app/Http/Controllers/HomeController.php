<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Category;
use App\Store;
use App\Post;
// use App\Shop;
// use App\Floor;

// use App\Image;
use App\Slider;
// use Storage;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $sliders = Slider::orderby('sorting', 'asc')->get();
        $stores = Store::with('avatar')->where('confirmed', true)->get();
        $sales = Post::with('avatar')->where('confirmed', true)->where('category_id', 1)->limit(4)->get();
        $news = Post::with('avatar', 'store', 'store.floor', 'store.shop')->where('confirmed', true)->where('category_id', 2)->limit(3)->get();
        return view('home', compact('sliders', 'stores', 'sales', 'news'));
    }
}
