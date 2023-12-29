<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugar extends Model
{
    protected $table = 'lugares';
    use HasFactory;

    // Relación uno a muchos con el modelo 'Area'
    public function areas()
    {
        return $this->hasMany(area::class, 'lugar_id', 'id');
    }
}
