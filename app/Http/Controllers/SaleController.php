<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Library\ResponseJson;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Object\SaleIndexObject;
use App\Http\Object\SaleUpdateObject;
use App\Http\Data\SaleUpdateData;
use App\Http\Requests\SaleStoreRequest;
use App\Http\Requests\SaleIndexRequest;
use App\User;
use Image;
use Auth;

use App\Http\Object\SaleStoreObject;
use App\Http\Data\SaleStoreData;

class SaleController extends Controller
{
    public function update(Request $request, $sale_id)
    {
        try {
            DB::beginTransaction();
            $SaleUpdateObject = new SaleUpdateObject($request, $sale_id);
            $SaleUpdateData = new SaleUpdateData($SaleUpdateObject->getArrayData(), $SaleUpdateObject->getModel());
            $SaleUpdateData->update();
            DB::commit();
            $message = 'Actualizado correctamente';
            return ResponseJson::success(['success'=> $message]);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function indexDetails(Request $request)
    {
        $data = \App\Sale::with('potion')->with('client')->get();
        $message = 'Consulta Exitosa';
        return ResponseJson::success(['success'=> $message],['data' => $data]);
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $modelSale = \App\Sale::where('id', '=', $request->get('sale_id'))->first();
            $modelSale->delete();
            DB::commit();
            $message = 'Borrado exitosamente';
            return ResponseJson::success(['success'=> $message]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $th;
        }
    }

    public function store(SaleStoreRequest $request)
    {
        $SaleStoreObject = new SaleStoreObject($request);
        $SaleStoreData = new SaleStoreData($SaleStoreObject->getArrayData());
        $SaleStoreData->create();
        $message = 'Registro exitoso';
        return ResponseJson::successCreated(['success'=> $message]);
    }

    public function index(SaleIndexRequest $request)
    {
        $SaleIndexObject = new SaleIndexObject($request);
        $data = $SaleIndexObject->all();
        $message = 'Consulta exitosa';
        return ResponseJson::success(
          ['success'=> $message],
      [
        'data' => $data
      ]
      );
    }
}
