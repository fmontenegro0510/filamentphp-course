<?php

namespace App\Models;

use App\Models\Postulante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documentacion extends Model
{
    use HasFactory;


    public function postulante(): BelongsTo
    {
        return $this->belongsTo(Postulante::class);
    }

}
