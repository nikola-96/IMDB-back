<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MovieImage;

class ImageController extends Controller
{
    public function show()
    {
        $image_id = MovieImage::findOrFail(7);
        $image = response()->file(public_path('thumbnails/'. $image_id->name));
        // $im = \Response::make($image->encode('png'));
        return $image;
        // $im = \Image::make('thumbnails/'. $image_id->name)->encode('jpg', 75);

    }
}
