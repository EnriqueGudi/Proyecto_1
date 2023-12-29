<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;

    //relación inversa definida
    public function lugar()
    {
        return $this->belongsTo(lugar::class, 'lugar_id', 'id');
    }

    //Relacion uno a muchos (un area tiene muchas sub_areas)
    public function sub_areas()
    {
        return $this->hasMany(sub_area::class, 'area_id', 'id');
    }
}
