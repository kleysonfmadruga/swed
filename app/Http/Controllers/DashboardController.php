<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Methods\Filters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        // dd(Auth::user());
        $cities = Filters::makeArrayCityByState();
        return view('pages.dashboard', compact('cities'));
    }

    public function loginCliente() {
        $title = "cliente";
        $type = 2;
        return view('pages.login.index', compact('title', 'type'));
    }

    public function loginGerente() {
        $title = "gerente";
        $type = 1;
        return view('pages.login.index', compact('title', 'type'));
    }

    public function signupCliente() {
        $title = "cliente";
        return view('pages.signup.index', compact('title'));
    }

    public function signupGerente() {
        $title = "gerente";
        return view('pages.signup.index', compact('title'));
    }

    public function login (Request $request) {
        $user = DB::table('users')->where('email', $request->email)->get()->first();

        if (Hash::check($request->password, $user->password)) {
            return redirect()->route('establishment.index');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Senha incorreta!']);
        }
        // dd($user, $request->all(), Hash::check($request->password, $user->password));
    }
}
