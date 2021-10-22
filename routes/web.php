<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

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

Route::get('/', function () {
    /* Por enquanto esta verificando apenas o admin */
    if (Auth::check() && Auth::user()->type_user === 1) {
        return inertia('Dashboard-admin');
    } elseif (Auth::check() && Auth::user()->type_user === 0) {
        return inertia('Cardapio');
    } else {
        return \inertia('Login');
    }
})->name('/');

/* Rotas de login e logout*/

Route::post('/', [AuthController::class, 'login'])->name('login.user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.user');

Route::get('/sorvetes', [CardapioController::class, 'cardapioSorvetes'])->name('sorvetes.cardapio');
Route::get('/acais', [CardapioController::class, 'cardapioAcais'])->name('acais.cardapio');
Route::get('/lanches', [CardapioController::class, 'cardapioLanches'])->name('lanches.cardapio');

Route::get('/checkout/{slug}', [CardapioController::class, 'checkoutProduto'])->name('checkout.produto');

Route::post('/adicionar-ao-carrinho', [CardapioController::class, 'adicionarProdAoCarrinho'])->name('add.to.cart');
Route::get('/meu-carrinho', [CarrinhoController::class,'verCarrinho'])->name('meu.carrinho');
Route::delete('/remover-prod-carrinho/{produto}', [CarrinhoController::class,'removerProduto']);








Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard-admin', function () {
        return Inertia::render('Dashboard-admin');
    })->name('dashboard.admin');
    Route::get('/gerenciar-sorvete', [AdminController::class, 'sorvetesView'])->name('gerenciar.sorvetes');
    Route::get('/gerenciar-acai', [AdminController::class, 'acaiView'])->name('gerenciar.sorvetes');
    Route::get('/gerenciar-lanche', [AdminController::class, 'lancheView'])->name('gerenciar.lanches');

    Route::resource('/produtos', ProdutoController::class);
    Route::resource('users', UserController::class);
});
