<?php namespace App\Http\Object;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Potion;

class SaleStoreObject
{
    private $potion_id;
    private $amount;
    private $sale_date;

    public function __construct($request)
    {
        $this->potion_id = $request->potion_id;
        $this->amount = (int) $request->get('amount');
        $this->sale_date = $request->sale_date;
    }

    public function calculateSale()
    {
        $sale = DB::table('potions')
                    ->where('potions.id','=',$this->potion_id)
                    ->join('potion_ingredients', 'potions.id', '=', 'potion_ingredients.potion_id')
                    ->sum('potion_ingredients.price');
        return $this->amount * $sale;
    }

    public function getArrayData()
    {
        return array(
            'amount' => $this->amount,
            'sale' => $this->calculateSale(),
            'sale_date' => $this->sale_date,
            'potion_id' => $this->potion_id,
            'client_id' => Auth::user()->id,
        );
    }
}
