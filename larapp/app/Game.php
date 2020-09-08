<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'image', 
        'description',
        'user_id',
        'category_id',
        'slider',
        'price'
    ];
}

