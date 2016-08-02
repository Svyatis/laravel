<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var array
     */
    protected $fillable = ['title','content','author_id'];

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('\App\Entities\User', 'author_id');
    }
}
