<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Visit extends Model
{
    public function movie()
    {
        return $this->hasOne(Movie::class);
    }
}
