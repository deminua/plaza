<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use Storage;

class ImageController extends Controller
{
    public function update($id, $type)
    {	

	    $image = Image::find($id);

	   if($type == 'delete') {
	    	$filename = $image->filename;
	    	$res = $image->delete();
	    	
	    	if($res) {
	    		Storage::disk('images')->delete($filename);
	    	}
	    }

	    if($type == 'avatar') {

			Image::where('imagegable_id', $image->imagegable_id)->where('imagegable_type', $image->imagegable_type)->update(['avatar' => false]);

	    	$image->avatar = true;
	    	$image->save();
	    }

	    return back();
    }
}
