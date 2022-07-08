<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Library\ResponseJson;

class SaleIndexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'client_id' => ['nullable'],
          'sale_date_start' => 'nullable|date',
          'sale_date_end' => 'nullable|date|after_or_equal:sale_date_start',
      ];
    }

    public function attributes()
    {
        return [
          'client_id' => 'Brujita',
          'sale_date_start' => 'Fecha Desde',
          'sale_date_end' => 'Fecha Hasta'
      ];
    }

    protected function failedValidation(Validator $validator)
    {
        return ResponseJson::errorRequest($validator->errors());
    }
}
