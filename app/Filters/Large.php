<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Large implements FilterInterface
{
    public function applyFilter(Image $image)
    {


		$image->resize(600, null, function ($constraint) {
		    $constraint->aspectRatio();
		});
        return $image;
       # return $image->resize(1600, null)->insert('images/watermark.png');

  //       $image->widen(1800, function ($constraint) {
  //   			$constraint->upsize();
		// });

		#return $image->insert('images/watermark.png', 'bottom-right', 20, 20);

    }
}