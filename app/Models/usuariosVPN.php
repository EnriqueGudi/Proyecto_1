<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuariosVPN extends Model
{
    protected $table = 'usuariosvpn';
    use HasFactory;

    public function destino_forma_vpn()
    {
        return $this->hasMany(destino_forma_vpn::class, 'usuariosVPN_id', 'id');
    }
}
