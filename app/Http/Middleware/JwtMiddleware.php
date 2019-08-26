<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\User;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       $token = $request->header('token');

       if(!$token){
           return response()->json([
               'error'=> 'Token requirido'
           ],401);
       }

       try{
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
       }catch(ExpiredException $e){
            return response()->json([
                'error' => "Token Expirado"
            ],400);
       }catch(Exception $e){
            return response()->json([
                'error' => "Ocorreu um erro na decodificacao"
            ],400);
        }

        $user = User::find($credentials->sub);

        $request->auth = $user;

        return $next($request);

    }
}
