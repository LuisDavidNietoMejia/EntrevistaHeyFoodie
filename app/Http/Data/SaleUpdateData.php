<?php namespace App\Http\Data;

class SaleUpdateData
{
    protected $data_array;
    protected $model;

    public function __construct($data_array, $model)
    {
        $this->data_array = $data_array;
        $this->model = $model;
    }

    public function update()
    {
        if ($this->model != null) {
            $flag = $this->model->update($this->data_array);
            if ($flag == false) {
                abort(500, 'Ocurrio un error actualizando los datos enviados.');
            }
            return true;
        } else {
            abort(500, 'No se consigio la data a actualizar');
        }
    }
}
