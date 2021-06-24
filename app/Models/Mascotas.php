<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Clientes;

class Mascotas extends Model
{
    use HasFactory;

    //UNA MASCOTA PERTENECE  A MUCHOS Clientes
    public function clientes()
    {
        return $this->belongsToMany(Clientes::class);
    }

}
