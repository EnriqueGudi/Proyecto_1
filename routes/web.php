<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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




    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/')->with('message', '¡Has cerrado sesión exitosamente!');
    })->name('logout');
    // Ruta para cerrar sesión

});

//rutas sin logear
Route::middleware('guest')->group(function () {
    //Acceso sin inicio de sesion

    // Ruta de inicio de sesión - Vista
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Ruta de inicio de sesión - Procesamiento
    Route::post('/login', [AuthController::class, 'login']);
});