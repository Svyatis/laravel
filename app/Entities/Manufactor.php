<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Manufactor extends Model
{
    public function products()
    {
        return $this->belongsToMany('\App\Entities\Product');
    }
}
