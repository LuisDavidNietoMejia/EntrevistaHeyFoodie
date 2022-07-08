<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Http\Library\ResponseJson;

class JwtMiddleware extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return ResponseJson::unauthorized(['unauthorized'=>'El token de autenticaciòn enviado no es valido...inicie sesion nuevamente'], 'login');
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return ResponseJson::unauthorized(['unauthorized'=>'El token de autenticaciòn enviado ha expirado...inicie sesion nuevamente'], 'login');
            }else{
                return ResponseJson::unauthorized(['unauthorized'=>'El token de autenticaciòn no ha sido enviado...inicie sesion nuevamente'], 'login');
            }
        }
        return $next($request);
    }
}
