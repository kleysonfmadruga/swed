<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.dashboard');
    }

    public function loginCliente() {
        $title = "cliente";
        return view('pages.login.index', compact('title'));
    }

    public function loginGerente() {
        $title = "gerente";
        return view('pages.login.index', compact('title'));
    }

    public function signupCliente() {
        $title = "cliente";
        return view('pages.signup.index', compact('title'));
    }

    public function signupGerente() {
        $title = "gerente";
        return view('pages.signup.index', compact('title'));
    }
}
