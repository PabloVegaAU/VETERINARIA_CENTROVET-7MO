<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mascotas;

class Vacunas extends Model
{
    use HasFactory;

    protected $guarded = [];

    //VARIAS VACUNAS PERTENECEN A UNA MASCOTA
    public function mascotas()
    {
        return $this->belongsTo(Mascotas::class);
    }
}
