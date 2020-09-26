<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Http\Request\ImageRequest;

class ResizeController extends Controller
{
    public function index()
    {

    }
    public function resize_image(ImageRequest $request)
    {
        $image = $request->file('image');
    }
}
