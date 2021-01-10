<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();
        
        if($path == "login" && empty(Session::get('admin_uname')))
        {
            return $next($request);
        }
        elseif($path == "login" && Session::get('admin_uname'))
        {
            return redirect('/'); 
        }
        elseif(Session::get('admin_uname'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
