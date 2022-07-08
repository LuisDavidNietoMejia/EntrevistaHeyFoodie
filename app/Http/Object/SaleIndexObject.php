<?php namespace App\Http\Object;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Sale;
use App\Potion;
use Illuminate\Support\Facades\DB;

class SaleIndexObject
{
    private $client_id = null;
    private $sale_date_start = null;
    private $sale_date_end = null;

    public function __construct($request)
    {
        $this->client_id = (int) $request->client_id;
        if (is_int($this->client_id) == false) {
            $this->client_id = null;
        }
        $this->sale_date_start = $request->sale_date_start;
        $this->sale_date_end = $request->sale_date_end;
    }

    public function all()
    {
        if ($this->client_id != null) {
          if($this->sale_date_start != null && $this->sale_date_end){
              $query = Potion::with(['sales' => function($query){
                      $query->select(
                        'sales.id',
                        'sales.amount',
                        'sales.sale',
                        'sales.potion_id',
                        DB::raw('SUM(sales.amount) as amount_total'),
                        DB::raw('SUM(sales.sale) as sales_total'),
                        DB::raw('COUNT(sales.client_id) as clients_total')
                      )
                      ->groupBy('sales.potion_id')
                      ->where('sales.client_id', '=', $this->client_id)
                      ->whereBetween('sales.sale_date', [$this->sale_date_start, $this->sale_date_end]);
                    }]);
          }
          else{
            $query = Potion::with(['sales' => function($query){
                    $query->select(
                      'sales.id',
                      'sales.amount',
                      'sales.sale',
                      'sales.potion_id',
                      DB::raw('SUM(sales.amount) as amount_total'),
                      DB::raw('SUM(sales.sale) as sales_total'),
                      DB::raw('COUNT(sales.client_id) as clients_total')
                    )
                    ->groupBy('sales.potion_id')
                    ->where('sales.client_id', '=', $this->client_id);
                  }]);
          }
        }
        else {
          $query = Potion::with(['sales' => function($query){
                  $query->select(
                    'sales.id',
                    'sales.amount',
                    'sales.sale',
                    'sales.potion_id',
                    DB::raw('SUM(sales.amount) as amount_total'),
                    DB::raw('SUM(sales.sale) as sales_total'),
                    DB::raw('COUNT(sales.client_id) as clients_total')
                  )
                  ->groupBy('sales.potion_id');
                }]);
        }

        return $query->get();
    }
}
