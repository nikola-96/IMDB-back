<?php

namespace App\Services;
use App\MovieImage;

class ImageCreationService
{
    protected $name;
    public function storeImage($image)
    {
        $this->name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($image)->resize(200, 200)->save(public_path('thumbnails/').$this->name);
        \Image::make($image)->resize(400, 400)->save(public_path('full-size/').$this->name);
        $image = MovieImage::create(['name'=> $this->name]);

        return $image->id;
    }
    public function getName()
    {
        return $this->name;
    }
}