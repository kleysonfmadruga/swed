<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Establishment\EstablishmentController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Service\ServiceController;
use App\Services\Methods\Filters;
use App\Http\Controllers\User\UserController;
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
        Route::post('/', [DashboardController::class, 'login'])->name('login.alternative');
        Route::get('/cliente', [DashboardController::class, 'loginCliente'])->name('login.cliente');
        Route::get('/gerente', [DashboardController::class, 'loginGerente'])->name('login.gerente');
    });

    /* ------------------------------ Signup group ------------------------------ */
    Route::group(['prefix' => 'signup'], function () {
        Route::group(['prefix' => '/cliente'], function () {
            Route::get('/', [DashboardController::class, 'signupCliente'])->name('signup.cliente');
            Route::post('/cadastrar', [UserController::class, 'newCliente'])->name('signup.newCliente');
        });
        Route::group(['prefix' => 'gerente'], function () {
            Route::get('/', [DashboardController::class, 'signupGerente'])->name('signup.gerente');
            Route::post('/cadastrar', [UserController::class, 'newGerente'])->name('signup.newGerente');
        });
    });

    Route::group(['prefix' => 'estabelecimento'], function () {
        Route::get('/', [EstablishmentController::class, 'index'])->name('establishment.index');
        Route::post('/salvar', [EstablishmentController::class, 'merge'])->name('establishment.merge');
        Route::get('/{id}', [EstablishmentController::class, 'show'])->name('establishment.show');
        Route::post('/novo-servico', [ServiceController::class, 'merge'])->name('service.merge');
        Route::post('/novo-produto', [ProductController::class, 'merge'])->name('product.merge');
        Route::get('/apagar-servico/{establishment_service_id}/{establishment_id}', [ServiceController::class, 'delete'])->name('service.delete');
        Route::get('/apagar-produto/{establishment_product_id}/{establishment_id}', [ProductController::class, 'delete'])->name('product.delete');
    });
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
