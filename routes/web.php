<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TipoViaturaController;
use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Auth;

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

/*======================== Home page ==================================*/
Route::get('/', [HomeController::class, 'homepage'])->name('home');
/*============X=========== Home page ==================================*/



/*======================== Utilizador routes ==================================*/
Route::get('/Registar', [UtilizadorController::class, 'create'])->name('registarUser');
/*============X=========== Utilizador routes ================X=================*/



/*======================= Cliente routes =========================================*/
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');
Route::post('/clienteAdd', [ClienteController::class, 'store'])->name('addCliente');
Route::delete('/delCliente', [ClienteController::class, 'destroy'])->name('delCliente');
Route::put('/editCliente', [ClienteController::class, 'update']);
Route::get('/cliente1', [ClienteController::class, 'cliente1'])->name('cliente1');
/*=====================X============= Cliente routes ==================X==================*/


/*======================= Authentication routes =========================================*/
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/admin', [AuthController::class, 'dashboard'])->name('admin');
Route::post('/login', [AuthController::class, 'login'])->name('efectuarLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
/*==============X============= Authentication routes ====================X====================*/


/* ===================================== Session ========================================*/
Route::get('session', [SessionController::class, 'session'])->name('session');
/* ====================X=============== Session ====================X====================*/


/*======================= Cores routes =========================================*/
Route::get('/cor', [CorController::class, 'index'])->name('cor');
Route::post('/addCor', [CorController::class, 'store'])->name('addCor');
Route::delete('/delCor', [CorController::class, 'destroy'])->name('delCor');
Route::put('/editCor', [CorController::class, 'update']);
/*=====================X============= Cores routes ==================X==================*/

/*======================= Tipo de viatura routes =========================================*/
Route::get('/tipo', [TipoViaturaController::class, 'index'])->name('tipo');
Route::post('/addTipo', [TipoViaturaController::class, 'store'])->name('addTipo');
Route::delete('/delTipo', [TipoViaturaController::class, 'destroy'])->name('delTipo');
Route::put('/editTipo', [TipoViaturaController::class, 'update'])->name('editTipo');
/*=====================X============= Cores routes ==================X==================*/


/*======================= Fabricante de viatura routes =========================================*/
Route::get('/fabricante', [FabricanteController::class, 'index'])->name('fabricante');
Route::post('/addFabricante', [FabricanteController::class, 'store'])->name('addFabricante');
Route::delete('/delFabricante', [FabricanteController::class, 'destroy'])->name('delFabricante');
Route::put('/editFabricante', [FabricanteController::class, 'update'])->name('editFabricante');
/*=====================X============= Fabricante de viatura routes ==================X==================*/


/*=======================  vaga routes =========================================*/
Route::get('/vaga', [VagaController::class, 'index'])->name('vaga');
Route::post('/addVaga', [VagaController::class, 'store'])->name('addVaga');
Route::delete('/delVaga', [VagaController::class, 'destroy'])->name('delVaga');
Route::put('/editVaga', [VagaController::class, 'update'])->name('editVaga');
/*=====================X============= vaga routes ==================X==================*/
