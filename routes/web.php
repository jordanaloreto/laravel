<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', [\App\Http\Controllers\ContatoController::class, 'login'])->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', [\App\Http\Controllers\ContatoController::class, 'clientes'])->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', [\App\Http\Controllers\ContatoController::class, 'produtos'])->name('app.produtos');
});

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
return redirect()->route('site.rota1');//FUNCIONA TIPO O REDIRECT NO CONTROLADOR
})->name('site.rota2');

// Route::redirect(' /rota2', '/rota1');//REDIRECT PELA ROTA
Route::fallback(function(){
    echo 'A rota acessada nao existe. <a href="'.route('site.index').'">clique aqui</a>';
});