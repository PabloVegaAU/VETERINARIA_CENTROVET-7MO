<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mascotas;
use App\Models\Reservaciones;

class Clientes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $fillable = [
        'nombre',
        'apellido',
        'email',
        'celular',
        'dni',
        'fecha_nac',
        'edad',
        'sexo',
        'domicilio',
        'password'
    ];
    #UN CLIENTE PUEDE TENER VARIAS MASCOTAS
    public function mascotas()
    {
        return $this->hasMany(Mascotas::class);
    }
    #UN CLIENTE PUEDE TENER VARIAS RESERVACIONES
    public function reservaciones()
    {
        return $this->hasMany(Reservaciones::class);
    }
}
