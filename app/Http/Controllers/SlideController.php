<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Store;
use App\Slider;
use Storage;

class SlideController extends Controller
{


    public function getModel(Request $request)
    {
    	$rowid = $request->input('model_id');
    	$model_name = $request->input('model_name');

    	if($model_name == 'Store') {
    		return Store::find($rowid);
    	}
    	if($model_name == 'Post') {
    		return Post::find($rowid);
    	}
    }

    public function create_slider(Request $request)
    {
        $slider = new Slider;
        $model = $this->getModel($request);
        return view('slider.create', compact('slider'));
    }

    public function edit_slider(Request $request)
    {

    	$slider = Slider::find($request->id);

	   	if(isset($request->confirmed)) {
	   		$slider->confirmed = $request->confirmed;
	   		$slider->save();
	   	}

	   if(isset($request->delete)) {

	    	$filename = $slider->filename;
	    	$res = $slider->delete();
	    	
	    	if($res) {
	    		Storage::disk('sliders')->delete($filename);
	    	}
	    }
	   		return back();
    }

    public function store_slider(Request $request)
    {
        if($request->name and $request->slider) {
        		$slider = $request->slider;
                 $filesize = $slider->getSize();
                 $filename = md5(time().$filesize).'.'.$slider->getClientOriginalExtension();
                 $destinationPath = 'storage/sliders';
                 $upload_success = $slider->move($destinationPath, $filename);
                 if($upload_success) {

                 	$model = $this->getModel($request);

                        $slider = new Slider([
                                'name' => $request->name,
                                'url' => $request->url,
                                'filename' => $filename,
                                'filesize' => $filesize,

                            ]);
                        $model->sliders()->save($slider);
                 }
        }

        return redirect()->route('admin.slider.index');
    }

    public function index_admin()
    {
    	$sliders = Slider::orderby('created_at', 'desc')->get();
    	return view('slider.admin', compact('sliders'));
    }

    
}
