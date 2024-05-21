<?php

namespace App\Models;

use App\Models\Documentacion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Postulante extends Model
{
    use HasFactory;


    protected $fillable = [
        'apellidos',
        'nombres',
        'dni',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'domicilio',
        'localidad',
        'email',
        'telefono',
        'foto_postulante',
        'estado_civil',
        'nacionalidad',
        'cargo_ocupa',
        'created_at',
        'updated_at',   
    ];




    public function documenacion(): HasOne
    {
        return $this->hasOne(Documentacion::class);
    }

}
