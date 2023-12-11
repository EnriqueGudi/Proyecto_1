<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AuthRequest extends FormRequest
{

    //para que se detenga al primer error de valicacion poner true
    protected $stopOnFirstFailure = true;

    // comprobar si el usuario tiene autorizacion
    public function authorize()
    {
        return true;
    }


    //reglas de validacion
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    // modificar el nombre del campo que muestra en el error
    public function attributes()
    {
        return [
            'email' => 'Correo Electronico',
            'password' => 'Contraseña'
        ];
    }

    //modificar el mensaje de error para cada caso
    public function messages()
    {
        return [
            'email.required' => 'Correo Electronico requerido',
            'password.required' => 'Contraseña requerida'
        ];
    }

    //devolver si hay error de validacion
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->first();
        
        $response = new JsonResponse([
            'message' => $errors,
            'type' => 'warning',
            'error' => $errors,
        ]);

        throw new ValidationException($validator, $response);

    }

}
