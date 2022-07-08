<?php namespace App\Http\Object;

use Illuminate\Support\Facades\Auth;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaleUpdateObject
{
    private $model;
    private $potion_id;
    private $client_id;
    private $amount;

    public function __construct($request, $sale_id)
    {
        $this->model = Sale::where('id','=', $sale_id)->first();
        $this->potion_id = $request->potion_id;
        $this->client_id = $request->client_id;
        $this->amount = (int) $request->get('amount');
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
            'potion_id' => $this->potion_id,
            'client_id' => $this->client_id,
        );
    }

    public function getModel()
    {
        return $this->model;
    }
}
