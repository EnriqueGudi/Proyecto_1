<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle the login request.
     */
    /*sdsds */
    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Comprueba si el correo está verificado
            if (Auth::user()->email_verified_at !== null) {
                // Authentication passed
                $request->session()->regenerate();
    
                return response()->json([
                    'type' => 'success',
                    'redirect' => url('/'), // Devuelve la URL de redirección
                ]);
            } else {
                // El correo no está verificado
                Auth::logout();
    
                return response()->json([
                    'type' => 'warning',
                    'message' => 'El correo no está verificado. Por favor, verifica tu correo electrónico.',
                ]);
            }
        }else{
            return response()->json([
                'type' => 'warning',
                'message' => 'Correo o contraseña incorrecto',
            ]);
        }
    }

    /**
     * Handle the logout request.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
