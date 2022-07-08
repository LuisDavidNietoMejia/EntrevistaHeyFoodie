<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potion extends Model
{
    protected $fillable = [
      'id','name','created_at','updated_at'
    ];

    public function potionIngredients()
    {
        return $this->hasMany('App\PotionIngredient');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

}
