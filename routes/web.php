<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\BandaController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\AgendaController;


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

    return view('auth.login');
});

Auth::routes();

//Route::get('/', function () {return view('welcome');});
route::group(['middelware' => 'auth'], function(){


Route::get('/home', [LocalController::class, 'index']);
Route::get('/banda', [BandaController::class, 'index']);


// Rutas del controlador BandaController
Route::get('/banda/lista', [BandaController::class, 'lista']);
Route::get('/banda/create', [BandaController::class, 'create']);
Route::post('/banda', [BandaController::class, 'store'])->name('banda.store');
Route::get('/banda/create', [BandaController::class, 'create'])->name('banda.create');
Route::get('/banda/lista', [BandaController::class, 'lista'])->name('banda.lista');
Route::delete('/banda/borrar/{id}', [BandaController::class, 'destroy'])->name('banda.destroy');
Route::get('/banda/{id}/edit', [BandaController::class, 'edit'])->name('banda.edit');
Route::put('/banda/{id}', [BandaController::class, 'update'])->name('banda.update');
Route::get('/banda/editar/{id}', [BandaController::class, 'edit'])->name('banda.editar');


// Rutas del controlador RepresentanteController
Route::post('/representante', [RepresentanteController::class, 'store'])->name('representante.store');
Route::get('/representante/create', [RepresentanteController::class, 'create'])->name('representante.create');
Route::get('/representante/lista', [RepresentanteController::class, 'lista']);
Route::get('/representante/{id}/edit', [RepresentanteController::class, 'edit']);
Route::delete('/representante/{id}', [RepresentanteController::class, 'destroy'])->name('representante.destroy');
Route::get('/representante/editar/{id}', [RepresentanteController::class, 'edit']);
Route::put('/representante/{id}', [RepresentanteController::class, 'update'])->name('representante.update');





Route::get('/agenda/lista', [AgendaController::class, 'index']);

Route::get('/local/lista', [LocalController::class, 'lista']);
 Route::get('/local/create', [LocalController::class, 'create']);




});




