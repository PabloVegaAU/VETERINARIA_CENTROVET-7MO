<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mascotas;

class Consultas extends Model
{
    use HasFactory;

    protected $guarded = [];

     //VARIAS CONSULTAS PERTENECEN A UNA MASCOTA
     public function mascotas()
    {
        return $this->belongsTo(Mascotas::class);
    }
}
