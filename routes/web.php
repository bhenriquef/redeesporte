<?php
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('login', 'AuthController@index');
Route::post('login', 'AuthController@login');
Route::get('registrar', 'AuthController@tela_registro');
Route::post('registrar', 'AuthController@registrar');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');


Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    // Rota dos eventos
    Route::get('listarEventos', 'EventoController@listarEventos');
    Route::post('novoEvento', 'EventoController@novoEvento');
    Route::get('pegarEvento/{id}', 'EventoController@pegarEvento');
    Route::put('editarEvento/{id}', 'EventoController@editarEvento');
    Route::delete('deletarEvento/{id}', 'EventoController@deletarEvento');

    // Rota das despesas
    Route::get('listarDespesas/{evento_id}', 'DespesaController@listarDespesas');
    Route::post('novaDespesa', 'DespesaController@novaDespesa');
    Route::get('pegarDespesa/{id}', 'DespesaController@pegarDespesa');
    Route::put('atualizarDespesa/{id}', 'DespesaController@atualizarDespesa');
    Route::delete('deletarDespesa/{id}', 'DespesaController@deletarDespesa');
});
