<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran todas las rutas web de la aplicación. Estas rutas son
| cargadas por RouteServiceProvider dentro de un grupo que contiene el
| middleware "web".
|
*/

Route::get('/', function () {
    return view('welcome'); // Ruta de la página de inicio
});

// Ruta para el panel de control, accesible solo por usuarios autenticados y verificados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Ruta para editar el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Ruta para actualizar el perfil del usuario
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Ruta para eliminar el perfil del usuario
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('productos', ProductoController::class);
});

// Se incluye el archivo de rutas de autenticación generadas por Laravel Breeze, Jetstream u otro paquete de autenticación
require __DIR__.'/auth.php';

// Grupo de rutas RESTful para la gestión de productos
Route::resource('productos', ProductoController::class);
