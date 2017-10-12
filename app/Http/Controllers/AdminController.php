<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Store;
use App\Post;

use App\Image;
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

    public function index()
    {
       # return view('admin.index');
    }


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
        $posts = $posts->orderby('updated_at', 'desc')->paginate(20);
        #dd($request->category_id);
        #$posts = Post::with('store')->paginate(3);
        return view('post.index', compact('posts', 'title'));
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

        #return dd($request->image('images'));

        #$path = $request->image('images')->store('avatars');
       # return dd($path);
        #return dd($request->image('images'));

        $this->multiple_image_upload($post->id, $request, 'App\Post');

    	return redirect()->route('admin.index.post');
    }

}
