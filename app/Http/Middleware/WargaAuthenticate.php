<?php

namespace App\Http\Middleware;

use Closure;

class WargaAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('warga')->check()) {
            //MAKA REDIRECT KE HALAMAN LOGIN
            return redirect(route('login.warga'));
        }
        //JIKA SUDAH MAKA REQUEST YANG DIMINTA AKAN DISEDIAKAN
        return $next($request);
    }
}
