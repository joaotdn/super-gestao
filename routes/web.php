<?php

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
// Route::get('/contato/{nome}/{categoria?}', function (string $nome, int $categoria = 0) {
//     echo 'Estamos aqui: ' . $nome . ': ' . $categoria;
// })->where('categoria', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function() {return 'Login';})->name('site.login');

// Agrupar rotas
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedoresController@index')->name('app.fornecedores');
    Route::get('/produtos', function() {return 'Produtos';})->name('app.produtos');
});

// Retdirecinar rotas
// Route::get('/rota1', function() {
//     return 'Rota 1';
// })->name('site.rota1');

// Route::get('/rota2', function() {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// Route::redirect('/rota2', '/rota1');

// Rota de fallback para acessar quando a rota não está disponível
Route::fallback(function() {
    echo '<a href="'. route('site.index') .'">Clique aqui</a> para ir para a página inicial';
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste');
