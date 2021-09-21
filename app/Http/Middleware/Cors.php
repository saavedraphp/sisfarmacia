<?php
namespace App\Http\Middleware;

use Closure;

/**
 *
 */
class Cors
{

    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Method', "GET")
            ->header('Access-Control-Allow-Headers', "Accept,Autorization,Content-Type")
        }
}
