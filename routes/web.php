<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovimientoController;


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
    return redirect(route('libro.index'));
});

Route::middleware('auth')->group(function () {

   	Route::get('/log_out', function() {
   		\Auth::logout();
   		return redirect('/');
   	})->name('salir');

   	Route::get('/libro/{libro}/agregar_ejemplar', 
   		[LibroController::class, 'agregarEjemplar'])->name('libro.agregar_ejemplar');
   	Route::get('/libro/{libro}/eliminar_ejemplar/{ejemplar}', 
   		[LibroController::class, 'eliminarEjemplar'])->name('libro.eliminar_ejemplar');
   	Route::resource('libro', LibroController::class);

    Route::patch('/prestamo/{prestamo}/devolver_ejemplar/{ejemplar}', 
      [MovimientoController::class, 'devolver_ejemplar'])->name('prestamo.devolver_ejemplar');
    Route::resource('prestamo', MovimientoController::class);

    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
    Route::patch('/perfil/actualizar_datos', [UserController::class, 'actualizar_datos'])->name('actualizar_datos');
    Route::patch('/perfil/actualizar_contrasenia', [UserController::class, 'actualizar_contrasenia'])->name('actualizar_contrasenia');
    Route::get('/agregar_operador', [UserController::class, 'agregar_operador'])->middleware('admin')->name('agregar_operador');
    Route::post('/agregar_operador', [UserController::class, 'registrar_operador'])->middleware('admin')->name('registrar_operador');

});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');	
})->name('dashboard');
