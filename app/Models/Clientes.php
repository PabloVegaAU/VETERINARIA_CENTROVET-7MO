<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mascotas;

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

    public function mascotas()
    {
        return $this->hasMany(Mascotas::class);
    }
}
