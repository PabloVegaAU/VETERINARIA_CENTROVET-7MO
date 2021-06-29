<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Clientes;

class Mascotas extends Model
{
    use HasFactory;

    protected $guarded = [];

    //VARIAS MASCOTAS PERTENECEN A UN CLIENTE
        public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }

}
