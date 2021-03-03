<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\User;
use App\Services\Methods\Filters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index() {
        $cities = Filters::makeArrayCityByState();
        return view('pages.dashboard', compact('cities'));
    }

/* -------------------------------------------------------------------------- */
/*              INICIO - return para as views de Login e Cadastro             */
/* -------------------------------------------------------------------------- */

/* ----------------------------- Página de login ---------------------------- */
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

/* --------------------------- Página de Cadastro --------------------------- */
    public function signupCliente() {
        $title = "cliente";
        return view('pages.signup.index', compact('title'));
    }

    public function signupGerente() {
        $title = "gerente";
        return view('pages.signup.index', compact('title'));
    }
/* -------------------------------------------------------------------------- */
/*              FINAL - return para as views de Login e Cadastro              */
/* -------------------------------------------------------------------------- */

    public function login (Request $request) {

        $auth_data = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if(Auth::attempt($auth_data) && Auth::user()->enabled != 0) {
            $model_has_roles = DB::table('model_has_roles')->where('model_id', Auth::user()->id)->get()->first();
            $role = DB::table('roles')->where('id', $model_has_roles->role_id)->get()->first();

            Session::put('model_id', $model_has_roles->model_id);
            Session::put('role', $role);
            if ($role->id == 1) {
                return redirect()->route('establishment.index', ['id' => Auth::user()->id]);
            } else {
                return redirect()->route('dashboard.index');
            }
        } else {
            Auth::logout();
            $request->session()->regenerateToken();
            return redirect()->back()->withErrors(["msg" => "Usuário e/ou senha incorretos. Por favor, tente novamente."]);
        }
    }

    public function logout(Request $request){
        if (!Auth::check() === true) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('dashboard.index');
        } else {
            Auth::logout();
            $request->session()->regenerateToken();
            return redirect()->route('dashboard.index');
        }
    }

    public function result(Request $request){

        $category = DB::table('categories')->where('name', '=', $request->category)->first();

        $response = [];
        $count = 0;

        if(!Empty($category)) {
            $establishmentCategory = DB::table('category_id_establishment_id')->where('category_id', '=', $category->id)->get()->pluck('establishment_id');
            $establishmentsByCategory = DB::table('establishments')->whereIn('id', $establishmentCategory)->get();
            if ($request->cities == "all") {
                foreach($establishmentsByCategory as $item) {
                    if ($item->enabled == 1) {
                        $response[$count] = $item;
                        $count++;
                    }
                }
            } else {
                foreach($establishmentsByCategory as $item) {
                    $aux = DB::table('address_establishment')->where('establishment_id', $item->id)->where('city_id', $request->cities)->get()->first();
                    if (!Empty($aux) && $item->enabled == 1) {
                        $response[$count] = $item;
                        $count++;
                    }
                }
            }
        }
        
        $establishmentsByJoin = DB::table('establishments')->where('name', 'like', '%'.$request->category.'%')->get();
        if(!$establishmentsByJoin->isEmpty()) {
            if ($request->cities == "all") {
                foreach($establishmentsByJoin as $item) {
                    if ($item->enabled == 1) {
                        $response[$count] = $item;
                        $count++;
                    }
                }
            } else {
                foreach($establishmentsByJoin as $item) {
                    $aux = DB::table('address_establishment')->where('establishment_id', $item->id)->where('city_id', $request->cities)->get()->first();
                    if (!Empty($aux) && $item->enabled == 1) {
                        $response[$count] = $item;
                        $count++;
                    }
                }
            }
        }
        $establishments = $response;
        if (Empty($establishments)) {
            return redirect()->back()->withErrors('Infelizmente nenhum resultado foi encontrado!');
        } else {
            if (Auth::check()){
                $user = Auth::user();
    
                return view('pages.result.index', compact('user', 'establishments'));
            } else {
                return view('pages.result.index', compact('establishments'));
            }
        }
    }


}
