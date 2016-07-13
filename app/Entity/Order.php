<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use PHPZen\LaravelRbac\Traits\Rbac;

class Order extends Model
{
    //
    public function customers()
    {
        return $this->belongsTo('App\Entity\User');
    }
}
