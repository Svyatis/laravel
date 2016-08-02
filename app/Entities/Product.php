<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = ['name','description','image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colors()
    {
        return $this->belongsToMany('\App\Entities\Color');
    }

    public function manufactors()
    {
        return $this->belongsToMany('\App\Entities\Manufactor');
    }
}
