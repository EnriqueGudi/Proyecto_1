<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_area extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->belongsTo(area::class, 'area_id', 'id');
    }
}
