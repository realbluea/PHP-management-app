<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::get('/sobrenos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/login', function () {return 'login';})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () { return 'Clientes';})->name('app.clientes');

    Route::get('/fornecedores', function () { return 'Fornecedores';})->name('app.fornecedores');

    Route::get('/produtos', function () { return 'Produtos';})->name('app.produtos');
});

Route::get('route1', function () { return 'route1'; })->name('site.route1');

Route::get('route2', function () { return redirect()->route('site.route1'); })->name('site.route2');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para voltar para a página principal.';
});