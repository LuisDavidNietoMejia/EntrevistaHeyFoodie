<?php namespace App\Http\Object;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Potion;

class PotionIndexObject
{
    public function all()
    {
       return Potion::with('potionIngredients')->get();
    }
}
