<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
      'id','amount','sale','sale_date','potion_id','client_id','created_at','updated_at'
    ];

    public function potion()
    {
        return $this->belongsTo('App\Potion');
    }

    public function client()
    {
        return $this->belongsTo('App\User');
    }

}
