<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destino_forma_vpn extends Model
{
    use HasFactory;
    protected $table = 'destino_forma_vpn';

    public function usuariosVPN()
    {
        return $this->belongsTo(usuariosVPN::class, 'usuariosVPN_id', 'id');
    }
}
