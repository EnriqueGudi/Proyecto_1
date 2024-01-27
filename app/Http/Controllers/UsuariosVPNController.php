<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuariosVPN;

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
}
