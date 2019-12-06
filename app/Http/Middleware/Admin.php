<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->access_level == 'admin') {
            return $next($request);
        }	
		return redirect()->action('InscricaoController@index');
    }
}
