<?php

namespace App\Http\Data;

use App\Sale;

class SaleStoreData
{
    protected $data_array;

    public function __construct($data_array)
    {
        $this->data_array = $data_array;
    }

    public function create()
    {
        $user = Sale::create($this->data_array);
        if ($user->id == null) {
            $message = 'No se pudo crear el registro';
            abort(500, $message);
        }
        return $user;
    }
}
