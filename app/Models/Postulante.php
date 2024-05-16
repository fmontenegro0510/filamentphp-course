<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Postulante extends Model
{
    use HasFactory;

    public function documenacion(): HasOne
    {
        return $this->hasOne(Documentacion::class);
    }

}
