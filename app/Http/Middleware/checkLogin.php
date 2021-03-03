<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class checkLogin
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
        if (Auth::check()) {
            $role = Session::get('role');
            if ($role->id == 1) {
                return redirect()->route('establishment.index', ['id' => Auth::user()->id]);
            } else {
                return redirect()->route('dashboard.index');
            }
        } else {
            return $next($request);
        }
    }
}
