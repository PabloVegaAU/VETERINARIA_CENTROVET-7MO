<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Clientes;
use App\Models\User;

class Reservaciones extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $fillable = [
        'fecha',
        'hora',
        'estado',
        'clientes_id',
        'users_id',
        'comentario',
    ];

    //VARIAS RESERVACIONES PERTENECEN A UN CLIENTE
        public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }
    //VARIAS RESERVACIONES PERTENECEN A UN USER
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
