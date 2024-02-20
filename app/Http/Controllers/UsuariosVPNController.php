<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuariosVPN;
use App\Http\Requests\UsuariosVPN\UsuariosVPNRequest;
use Illuminate\Support\Facades\DB;

class UsuariosVPNController extends Controller
{
    public function index()
    {

        $usuariosvpn = usuariosVPN::all();
        // Codificación para no mostrar los valores
        $usuariosvpnEncoded = json_encode($usuariosvpn->load('destino_forma_vpn'));
        
        return view('usuarios_vpn', [
            'usuarios_vpn' => $usuariosvpnEncoded,
        ]);
      
    }

    public function set_usuarioVPN(UsuariosVPNRequest $request)
    {
        // Obtener los datos enviados desde la petición POST
        $datos = $request->all();
 
        DB::beginTransaction();
        try{

            $usuarioVPN = new usuariosVPN();
            $usuarioVPN->empleado = $datos['new_empleado'];
            $usuarioVPN->user_login = $datos['new_user_login'];
            $usuarioVPN->bu = $datos['new_bu'];
            $usuarioVPN->area = $datos['new_area'];
            $usuarioVPN->puesto = $datos['new_puesto'];
            $usuarioVPN->email = $datos['new_correo'];
            $usuarioVPN->serv_puer_form = $datos['new_serv_puer_form'];
            $usuarioVPN->grupo_mega_vpv = $datos['new_megavpv'];
            $usuarioVPN->autentucacion = $datos['new_autenthication'];
            $usuarioVPN->comentarios = $datos['new_comentarios'];
            $usuarioVPN->formato = $datos['new_formato'];
            $usuarioVPN->estado = $datos['new_estado'];
            $usuarioVPN->expiracion = $datos['new_fecha_exp'];
            $usuarioVPN->jefe = $datos['new_jefe'];
           
            $usuarioVPN->save();
            DB::commit();
        }catch(ValidationException $e){
            DB::rollBack();
            return response()->json(['type' => 'error', 
            'message' => 'Hubo algún error',
           ]);
        }
        
        $ultimo_usuarioVPN = usuariosVPN::with('destino_forma_vpn')->latest()->first();  
        
        return response()->json(['type' => 'success', 
                                 'message' => 'Usuario VPN registrado correctamente',
                                 'usuariosVPN' => $ultimo_usuarioVPN,
                                ]);
    }
}
