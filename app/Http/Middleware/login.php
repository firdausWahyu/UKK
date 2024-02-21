<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Petugas;
use Illuminate\Http\Request;

class login 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $login =  Petugas::where([
            ['email','=', 'farel@gmail.com' ],
            ['password','=', '123' ]
        ])->first();

        // dd($login);

        if ($login !== null) {
            return redirect('/user');
        } else{
            return redirect('/login');
        }
        return $next($request);
    }
}
