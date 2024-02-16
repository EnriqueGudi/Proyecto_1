<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;
use App\Models\usuariosVPN;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // Crear un usuario con datos específicos
    User::factory()->create([
        'name' => 'Enrique Alexis Gudiño Portilla',
        'email' => 'enrique@gmail.com',
        'role' => 'Administrador',
    ]);

    // Crear otro usuario con diferentes datos específicos
    User::factory()->create([
        'name' => 'Bryan Ocampo',
        'email' => 'bryan@gmail.com',
        'role' => 'Administrador',
    ]);

    //CAMBIAR POR FACTORY DE USUARIOSVPN Y AGREGAR EL MODEL
    usuariosVPN::factory()->create([
        'empleado' => 'Enrique Alexis Gudino Portilla',
        'user_login' => 'HPH\Gudiño.Enrique',
        'bu' => 'LCT',
        'area' => 'Sistemas',
        'puesto' => 'Soporte Técnico',
        'email' => 'enrique@gmail.com',
        'serv_puer_form' => 'Control_remoto',
        'grupo_mega_vpv' => 'Acceso_VPN_FW_Usuarios',
        'autentucacion' => 'Checkpoint',
        'comentarios' => '',
        'formato' => 'Entregado',
        'estado' => 'Activo',
        'expiracion' => '31-dic-24',
        'jefe' => 'Adolfo Oliver',
    ]);

    usuariosVPN::factory()->create([
        'empleado' => 'Jose Luis Barreto de la Cruz',
        'user_login' => 'HPH\Barreto.Jose',
        'bu' => 'LCT',
        'area' => 'Sistemas',
        'puesto' => 'Soporte Técnico',
        'email' => 'barreto@gmail.com',
        'serv_puer_form' => 'Control_remoto',
        'grupo_mega_vpv' => 'Acceso_VPN_FW_Usuarios',
        'autentucacion' => 'Checkpoint',
        'comentarios' => '',
        'formato' => '',
        'estado' => 'Activo',
        'expiracion' => '31-dic-24',
        'jefe' => 'Adolfo Oliver',
    ]);

    usuariosVPN::factory()->create([
        'empleado' => 'Jose Leyva',
        'user_login' => 'hk.jose',
        'bu' => 'HK',
        'area' => 'Sistemas',
        'puesto' => '',
        'email' => 'leyva.josehk@hutchinsonports.com',
        'serv_puer_form' => 'Control_remoto',
        'grupo_mega_vpv' => 'Acceso_VPN_FW_Usuarios',
        'autentucacion' => 'Checkpoint',
        'comentarios' => '',
        'formato' => 'No',
        'estado' => 'Expirado',
        'expiracion' => '30-jun-23',
        'jefe' => '',
    ]);

    usuariosVPN::factory()->create([
        'empleado' => 'chaquichan',
        'user_login' => 'hk.chaquichan',
        'bu' => 'HK',
        'area' => 'Sistemas',
        'puesto' => '',
        'email' => 'chaquichan@hutchinsonports.com',
        'serv_puer_form' => 'Control_remoto',
        'grupo_mega_vpv' => 'Acceso_VPN_FW_Usuarios',
        'autentucacion' => 'Checkpoint',
        'comentarios' => '',
        'formato' => 'No',
        'estado' => 'Expirado',
        'expiracion' => '31-jul-23',
        'jefe' => '',
    ]);

    usuariosVPN::factory()->create([
        'empleado' => 'Marco Polo',
        'user_login' => 'hk.marco',
        'bu' => 'HK',
        'area' => 'Sistemas',
        'puesto' => '',
        'email' => 'polo.marco@hutchinsonports.com',
        'serv_puer_form' => 'Control_remoto',
        'grupo_mega_vpv' => 'Acceso_VPN_FW_Usuarios',
        'autentucacion' => 'Checkpoint',
        'comentarios' => '',
        'formato' => 'Digital',
        'estado' => 'Activo',
        'expiracion' => '31-dic-24',
        'jefe' => '',
    ]);
    


    }
}
