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


    Route::get('/banda/lista', [BandaController::class, 'lista']);


    Route::get('/cliente/lista', [RepresentanteController::class, 'lista']);


    Route::get('/agenda/lista', [AgendaController::class, 'lista']);
    

});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
