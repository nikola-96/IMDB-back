<?php

namespace App\Services;

class ImageCreationService
{
    public function storeImage($image)
    {
        $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($image)->resize(200, 200)->save(public_path('thumbnails/').$name);
        \Image::make($image)->resize(400, 400)->save(public_path('full-size/').$name);

    }
}