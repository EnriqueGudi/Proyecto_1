<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Ubicaciones\UbicacionesController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//rutas logeado
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/ubicaciones', [UbicacionesController::class, 'index'])->name('ShowUbicaciones');




    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/')->with('message', '¡Has cerrado sesión exitosamente!');
    })->name('logout');
    // Ruta para cerrar sesión



    //con permisos de administrador
    Route::post('/set_ubicacion', [UbicacionesController::class, 'set_sub_area']);


});

//rutas sin logear
Route::middleware('guest')->group(function () {
    //Acceso sin inicio de sesion

    // Ruta de inicio de sesión - Vista
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Ruta de inicio de sesión - Procesamiento
    Route::post('/login', [AuthController::class, 'login']);

    // Ruta de registro - Vista
    Route::get('/registro', [UserController::class, 'show'])->name('registro');
    // Ruta de registro - Procesamiento
    Route::post('/registro', [UserController::class, 'registrar']);

    //Ruta de confirmacion de correo
    Route::get('/confirmacion/{id}/{token}', [UserController::class, 'confirmar_correo'])->name('confirmacion');
});