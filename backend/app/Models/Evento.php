<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha',
        'lugar',
        'categoria',
        'descripcion'
    ];

    /**
     * Usuarios que han marcado este evento como favorito.
     */
    public function usuariosFavoritos()
    {
        return $this->belongsToMany(User::class, 'evento_user');
    }
}