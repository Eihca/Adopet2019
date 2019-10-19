<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pet_class', 'pet_name', 'pet_price', 'pet_char', 'pet_envi', 'pet_life', 'pet_pic'
    ];
}
