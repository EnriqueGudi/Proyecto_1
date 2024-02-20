<?php

namespace App\Http\Requests\UsuariosVPN;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class UsuariosVPNRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'new_empleado' => 'required',
            'new_user_login' => 'required',
            'new_bu' => 'required',
            'new_area' => 'required',
            'new_puesto' => 'required',
            'new_correo' => 'required|email|unique:usuariosvpn,email',
            'new_serv_puer_form' => 'required',
            'new_megavpv' => 'required',
            'new_autenthication' => 'required',
            'new_comentarios' => 'required',
            'new_formato' => 'required',
            'new_estado' => 'required',
            'new_fecha_exp' => 'required',
            'new_jefe' => 'required',
            'new_ip' => 'required|array',
            'new_ip.*' => 'required|ip',
        ];
    }

    public function attributes()
    {
        return [
            'new_empleado' => 'Nombre de Empleado',
            'new_user_login' => 'User.login',
            'new_correo' => 'Correo Electronico',
            'new_ip.*'=> 'IP',
        ];
    }

    public function messages()
    {
        return [
            'new_empleado.required' => 'Nombre de Empleado Requerido',
            'new_user_login.required' => 'User.login Requerido'
        ];
    }

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
