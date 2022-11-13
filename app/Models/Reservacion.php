<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table = 'reservaciones';
    use HasFactory;

    protected $fillable = [
        'id',
        'actividad_id',
        'numero_total_personas',
        'precio_total',
        'fecha_reservacion',
        'fecha_realizacion'
    ];

    public function actividad(){
        return $this->belongsTo(Actividad::class, 'actividad_id', 'id');
    }

    public $timestamps = false;

}


