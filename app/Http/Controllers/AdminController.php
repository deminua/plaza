<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Store;
use App\Post;
use App\Shop;
use App\Floor;

use App\Image;
use App\Slide;
use Storage;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function multiple_image_upload($id, Request $request, $imagegable_type)
    {   
        if($request->images) {
            foreach ($request->images as $image) {
                 $filesize = $image->getSize();
                 $filename = md5(time().$filesize).'.'.$image->getClientOriginalExtension();
                 $destinationPath = 'storage/images';
                 $upload_success = $image->move($destinationPath, $filename);
                 if($upload_success) {
                    $image = new Image;
                    $image->filename = $filename;
                    $image->filesize = $filesize;
                    $image->imagegable_id = $id;
                    $image->imagegable_type = $imagegable_type;
                    $image->save();
                 }
            }
        }
    }

/*
    public function multiple_slide_upload($model, $request)
    {
        if($model and $request->sliders) {
            foreach ($request->sliders as $slide) {
                 $filesize = $slide->getSize();
                 $filename = md5(time().$filesize).'.'.$slide->getClientOriginalExtension();
                 $destinationPath = 'storage/sliders';
                 $upload_success = $slide->move($destinationPath, $filename);
                 if($upload_success) {

                        $slide = new Slider([
                                'name' => $model->name,
                                'filename' => $filename,
                                'filesize' => $filesize,

                            ]);
                        $model->sliders()->save($slide);

                 }
            }
        }
    }
*/
    public function index()
    {
       # return view('admin.admin');
    }






/************** Магазины **************/

    public function index_store(Request $request)
    {
        $stores = Store::with('shop', 'avatar', 'floor');
        $stores = $stores->orderby('created_at', 'desc')->paginate(40);
        return view('store.admin', compact('stores'));
    }

    public function create_store(Request $request)
    {
        $shop = Shop::pluck('name', 'id');
        $floor = Floor::pluck('name', 'id');
        
        if(isset($request->id)) {
            $store = Store::find($request->id);
        } else {
            $store = new Store;
        }
        return view('store.create', compact('store', 'shop', 'floor'));
    }

    public function edit_store(Request $request)
    {
        $post = Store::find($request->id);
        if(isset($request->confirmed)) { $post->confirmed = $request->confirmed; }
        $post->save();
        return redirect()->route('admin.index.store');
    }


    public function store_store(Request $request)
    {
        $data = $request->except(['_token']);
        $store = Store::updateOrCreate(['id' => $request->id], $data);
        $this->multiple_image_upload($store->id, $request, 'App\Store');
        return redirect()->route('admin.index.store');
    }


    public function delete_store(Request $request)
    {
        $store = Store::find($request->id);
        if($store->posts->count() >= 1) {
         return redirect()->route('admin.index.post', ['store_id'=>$store->id])->with('danger', 'Удаление невозможно! Причина: присутствует '.$store->posts->count() .' записи, удалите их, потом повторите удаление.');
        }
        if($store->sliders()->count() >= 1) {
         return back()->with('danger', 'Удаление невозможно! Причина: присутствует слайд, удалите слайд потом повторите удаление.');
        }
        if($store->images) {
            foreach ($store->images as $image) {
                Image::destroy($image->id);
                Storage::disk('images')->delete($image->filename);
            }
        }
        $store->delete();
        return redirect()->route('admin.index.store');
    }









/************** Записи **************/

    public function index_post(Request $request)
    {

        $posts = Post::with('store');
        $title = 'Все записи';
        if($request->category_id) {
            $posts->where('category_id', $request->category_id);
            $category = Category::find($request->category_id);
            $title = $category->name;
        }
        if($request->store_id) {
            $posts->where('store_id', $request->store_id);
            $store = Store::find($request->store_id);
            $title = $store->name;
        }
        $posts = $posts->orderby('created_at', 'desc')->paginate(40);
        return view('post.admin', compact('posts', 'title'));
    }

    public function create_post(Request $request)
    {
         
    	$category = Category::pluck('name', 'id');
    	$store = Store::where('confirmed', 1)->pluck('name', 'id');
    	if(isset($request->id)) {
    		$post = Post::find($request->id);
    	} else {
    		$post = new Post;
    	}
    	return view('post.create', compact('post', 'category', 'store'));
    }

    public function edit_post(Request $request)
    {
        $post = Post::find($request->id);
        if(isset($request->confirmed)) { $post->confirmed = $request->confirmed; }
        $post->save();
        return redirect()->route('admin.index.post');
    }

    public function delete_post(Request $request)
    {
        $post = Post::find($request->id);
        if($post->sliders()->count() >= 1) {
            return back()->with('danger', 'Удаление невозможно! Причина: присутствует слайд, удалите слайд потом повторите удаление.');
        }
        if($post->images) {
            foreach ($post->images as $image) {
                Image::destroy($image->id);
                Storage::disk('images')->delete($image->filename);
            }
        }
        $post->delete();
        return redirect()->route('admin.index.post');
    }

    public function store_post(Request $request)
    {

    	$data = $request->except(['_token']);
    	$post = Post::updateOrCreate(['id' => $request->id], $data);
        #$this->multiple_slide_upload($post, $request);
        $this->multiple_image_upload($post->id, $request, 'App\Post');
        return redirect()->route('admin.index.post');
    }

}
