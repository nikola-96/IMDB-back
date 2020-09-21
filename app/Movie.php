<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Visit;

class Movie extends Model
{
    public function visits()
    {
        return $this->hasOne(Visit::class);
    }
}
