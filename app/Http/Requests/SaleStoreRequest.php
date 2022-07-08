<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Library\ResponseJson;

class SaleStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'potion_id' => ['required', 'numeric', 'exists:potions,id'],
          'amount' => ['required', 'numeric','min:1'],
          'sale_date' => ['required', 'date'],
      ];
    }

    public function attributes()
  {
      return [
          'potion_id' => 'Poción',
          'amount' => 'Cantidad',
          'sale_date' => 'Fecha Compra'
      ];
  }

    protected function failedValidation(Validator $validator)
    {
        return ResponseJson::errorRequest($validator->errors());
    }
}
