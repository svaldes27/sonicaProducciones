<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\BandaController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EquipamientoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Spatie\Permission\Models\Role;



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


Route::get('/home', [LocalController::class, 'index']);
Route::get('/banda', [BandaController::class, 'index']);
Route::get('/representante/lista', [RepresentanteController::class, 'index']);


// Rutas del controlador BandaController
Route::post('/banda', [BandaController::class, 'store'])->name('banda.store');
Route::get('/banda/create', [BandaController::class, 'create'])->name('banda.create');
Route::get('/banda/lista', [BandaController::class, 'lista']);
Route::delete('/banda/{id}', [BandaController::class, 'destroy'])->name('banda.destroy');
Route::get('/banda/editar/{id}', [BandaController::class, 'edit']);
Route::put('/banda/{id}', [BandaController::class, 'update'])->name('banda.update');



Route::get('/agenda/lista', [EventoController::class, 'index']);

Route::post('/agenda/mostrar', [EventoController::class, 'show']);
Route::post('/agenda/agregar', [EventoController::class, 'store']);
Route::post('/agenda/editar/{id}', [EventoController::class, 'edit']);
Route::post('/agenda/modificar/{evento}', [EventoController::class, 'update']);
Route::post('/agenda/eliminar/{id}', [EventoController::class, 'destroy']);



// Rutas del controlador LocalController
Route::get('/local/lista', [LocalController::class, 'lista'])->name('local.lista');
Route::get('/local/create', [LocalController::class, 'create'])->name('local.create');
Route::post('/local', [LocalController::class, 'store'])->name('local.store');
Route::delete('/local/{id}', [LocalController::class, 'destroy'])->name('local.destroy');
Route::get('/local/editar/{id}', [LocalController::class, 'edit']);
Route::put('/local/{id}', [LocalController::class, 'update'])->name('local.update');
Route::get('/local/{local}', [LocalController::class, 'show'])->name('local.show');


Route::get('/getProvincias', [LocalController::class, 'getProvincias'])->name('getProvincias');
Route::get('/getComunas', [LocalController::class, 'getComunas'])->name('getComunas');



// Rutas del controlador EquipamientoController
Route::post('/equipamiento', [EquipamientoController::class, 'store'])->name('equipamiento.store');
Route::get('/equipamiento/create', [EquipamientoController::class, 'create'])->name('equipamiento.create');
Route::get('/equipamiento/lista', [EquipamientoController::class, 'lista']);
Route::delete('/equipamiento/{id}', [EquipamientoController::class, 'destroy'])->name('equipamiento.destroy');
Route::get('/equipamiento/editar/{id}', [EquipamientoController::class, 'edit']);
Route::put('/equipamiento/{id}', [EquipamientoController::class, 'update'])->name('equipamiento.update');
Route::get('/equipamiento/{id}', [EquipamientoController::class, 'show'])->name('equipamiento.show');







// Rutas del controlador RepresentanteController
Route::post('/representante', [RepresentanteController::class, 'store'])->name('representante.store');
Route::get('/representante/create', [RepresentanteController::class, 'create'])->name('representante.create');
Route::get('/representante/lista', [RepresentanteController::class, 'lista']);
Route::delete('/representante/{id}', [RepresentanteController::class, 'destroy'])->name('representante.destroy');
Route::get('/representante/editar/{id}', [RepresentanteController::class, 'edit'])->name('representante.editar');
Route::put('/representante/{id}', [RepresentanteController::class, 'update'])->name('representante.update');


Route::get('/', function () {

    return view('auth.login');
})->middleware('guest');

Auth::routes();

//Route::get('/', function () {return view('welcome');});
Route::middleware(['auth'])->group(function () {


});



