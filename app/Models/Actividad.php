<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    use HasFactory;

    protected $fillable = [
        'id',
        'imagen',
        'titulo',
        'descripcion',
        'fecha_disponibilidad_inicio',
        'fecha_disponibilidad_fin',
        'precio_unitario',
        'popularidad',
        'actividades_relacionadas'
    ];

    public function reservaciones (){
        return $this->hasMany(Reservacion::class);
    }

    public $timestamps = false;

}
