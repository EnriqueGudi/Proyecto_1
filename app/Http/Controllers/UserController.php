<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ConfirmacionRegistro; // Importa la clase del correo de confirmación
use RealRashid\SweetAlert\Facades\Alert; //alertas de sweetalert
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        return view('registro');
    }

    public function registrar(Request $request)
    {
        try {
            // Validar los datos de entrada
            $this->validate($request, [
                'nombre' => 'required',
                'correo' => 'required|email|unique:users,email',
                'contraseña' => 'required|min:6|confirmed',
                'contraseña_confirmation' => 'required|min:6',
            ]);
        } catch (ValidationException $e) {
            // Si la validación falla, devuelve una respuesta JSON con los errores
            return response()->json([
                'type' => 'warning',
                'message' => $e->validator->errors()->first(),
            ]);
        }

        $token = Str::random(40);

        // Verificar si el token ya existe en la base de datos
        while (User::where('verification_token', $token)->exists()) {
            $token = Str::random(40); // Generar un nuevo token si ya existe
        }
        // Crear el nuevo usuario
        try {
            $user = new User();
            $user->name = $request->input('nombre');
            $user->email = $request->input('correo');
            $user->password = Hash::make($request->input('contraseña'));
            $user->verification_token = $token;
            $user->role = "Usuario";
            $user->save();
            Mail::to($user->email)->send(new ConfirmacionRegistro($user));
        } catch (\Exception $e) {

            $user->delete();

            return response()->json([
                'type' => 'warning',
                'message' => "No se pudo enviar el correo de verificación, por favor intente más tarde", 
            ]);
        } 
  
        return response()->json([
            'type' => 'success',
            'redirect' => url('/login'), 
        ]);
    }

    public function confirmar_correo($id, $token)
    {
        // Buscar el usuario por ID
        $user = User::find($id);

        // Verificar si el usuario existe y el token de verificación coincide
        if ($user && $user->verification_token === $token) {
            // Actualizar el estado de verificación del usuario
            $user->email_verified_at = now();
            $user->verification_token = null;
            $user->save();

            // Redirigir al usuario a la página de confirmación exitosa
            $swalParams = [
                'title' => 'Verificación de correo exitosa',
                'text' => 'Ya puede iniciar sesion :)',
                'type' => 'success',
            ];
        
            return view('login')->with('swalParams', $swalParams);
        }

        // Si el usuario no existe o el token no coincide, redirigir a una página de error
        $swalParams = [
            'title' => 'Hubo un problema',
            'text' => 'Favor de solicitar un correo de confirmacion nuevo si aun no puede iniciar sesion',
            'type' => 'warning',
        ];
    
        return view('login')->with('swalParams', $swalParams);
    }
}
