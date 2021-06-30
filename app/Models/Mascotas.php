<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Clientes;

class Mascotas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $fillable = [
        'nombre',
        'especie',
        'raza',
        'sexo',
        'clientes_id'
    ];

    //VARIAS MASCOTAS PERTENECEN A UN CLIENTE
        public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }

}
