<?php

use App\Http\Controllers\AsociadoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DirectoriocargoController;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\ParentezcoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VinculoController;
use App\Http\Livewire\Eventos;
use App\Http\Livewire\IntegrantesDirectorio;
use App\Http\Livewire\Vinculos;
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

Route::get('/', function () {
    return view('welcome');
})->name('web');

Route::get('/example', function () {
    return view('example');
})->name('example');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:home')->name('home');
Route::resource('/users',UserController::class)->only(['index','edit','update'])->names('users');
Route::post('users.resetpass/{id}',[UserController::class,'resetpass'])->name('users.resetpass');
Route::get('/profile',[UserController::class,'show'])->name('profile');

Route::resource('/roles',RoleController::class);

Route::resource('personas', PersonaController::class)->names('personas');
Route::resource('grados', GradoController::class)->names('grados');
Route::resource('estados', EstadoController::class)->names('estados');
Route::resource('asociados', AsociadoController::class)->names('asociados');
Route::resource('parentezcos', ParentezcoController::class)->names('parentezcos');
Route::get('vinculos/{id}', [AsociadoController::class, 'vinculos'])->name('vinculos');

Route::resource('cargos', CargoController::class)->names('cargos');
Route::resource('directorios', DirectorioController::class)->names('directorios');
Route::get('directorio-integrantes/{id}', IntegrantesDirectorio::class)->name('directorio-integrantes');
Route::resource('directoriocargos', DirectoriocargoController::class)->names('directoriocargos');

Route::get('asociados.deleted',[AsociadoController::class,'deleted'])->name('asociados.deleted');
Route::resource('eventos', EventoController::class)->names('eventos');

Route::resource('pruebas',PruebaController::class);
Route::get('events', [EventoController::class,'allEvents'])->name('events');
