<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loged
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() === true){
            return redirect()->route('profile.logout');
        } else {
            return $next($request);
        }
    }
}
