<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.dashboard');        
    }

    public function loginCliente() {
        $title = "Cliente";
        return view('pages.login.index', compact('title'));
    }

    public function loginGerente() {
        $title = "Gerente";
        return view('pages.login.index', compact('title'));
    }

}
