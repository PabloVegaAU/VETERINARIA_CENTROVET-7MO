<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Clientes extends Model
{
    use HasFactory;

    protected $guarded = [];

    //UN Cliente LE PERTENECE A UN SOLO USUARIO
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
