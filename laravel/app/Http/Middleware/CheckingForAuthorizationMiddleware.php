<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckingForAuthorizationMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('api')->check()){
            return $next($request);
            //return Response(['data' => 99999999999999999999]);
        }
        else{
            return Response(['data' => 'Пользователь вне системы'], 401);
        }
    }
}
