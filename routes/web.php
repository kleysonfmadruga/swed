<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => '/'], function () {

    /* ----------------------------- Dashboard group ---------------------------- */
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('resultado', [DashboardController::class, 'resultado'])->name('dashboard.resultado');

    /* ------------------------------- Login Group ------------------------------ */
    Route::group(['prefix' => 'login'], function () {
        Route::get('/cliente', [DashboardController::class, 'loginCliente'])->name('login.cliente');
        Route::get('/gerente', [DashboardController::class, 'loginGerente'])->name('login.gerente');
    });

    /* ------------------------------ Signup group ------------------------------ */
    Route::group(['prefix' => 'signup'], function () {
        Route::get('/cliente', [DashboardController::class, 'signupCliente'])->name('signup.cliente');
        Route::get('/gerente', [DashboardController::class, 'signupGerente'])->name('signup.gerente');
    });
});

/* Route::get('/teste', function(){
    return view('templates.main');
});
 */
