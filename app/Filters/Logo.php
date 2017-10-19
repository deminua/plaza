<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Logo implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        #$image->fit(800, null);
        #return $image->resizeCanvas(300, 800, 'center', false);
        return $image->resize(300, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->greyscale();

  //      $image->heighten(600, function ($constraint) {
		//     $constraint->upsize();
		// });

  //      return $image->resizeCanvas(600, 600, 'center');
 
    }
}