<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Image;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\requestUpdateUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Http\Object\UserStoreObject;
use App\Http\Data\UserStoreData;
use App\Http\Object\PotionIndexObject;
use Auth;
use App\Http\Library\ResponseJson;

class PotionController extends Controller
{
    public function index(Request $request)
    {
        $PotionIndexObject = new PotionIndexObject();
        $data = $PotionIndexObject->all();
        $message = 'Consulta exitosa';
        return ResponseJson::success(['success'=> $message],
        [
          'data' => $data
        ]);
    }
}
