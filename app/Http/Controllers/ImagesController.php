<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImagesController extends Controller
{
    public function getImage($foldername, $filename)
	{	
		return Image::make( storage_path().'/app/'.$foldername.'/'.$filename)->resize(380, null, function ($constraint) {
    			$constraint->aspectRatio();
			})->response('png');
	}
}
