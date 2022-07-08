<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotionIngredient extends Model
{
    protected $fillable = [
      'id','name','price','amount','potion_id'
    ];
}
