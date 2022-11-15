<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Actividad;
use App\Models\Reservacion;

class ReservacionRepository
{
    public function __construct()
    {
        $this->model = new Reservacion();
    }

    public function reservaciones()
    {
        $reservaciones = $this->model->with('actividad');
        return $reservaciones->get();
    }

    public function reservar(Request $request)
    {
        $actividad = Actividad::find($request->actividad_id);

        $this->model->create([
            'actividad_id' => $request->actividad_id,
            'numero_total_personas' => $request->personas,
            'precio_total' => $actividad->precio_unitario * $request->personas,
            'fecha_reservacion' => now(),
            'fecha_realizacion' => $request->fecha
        ]);

        return ['success' => 'true'];
    }

    public function cancelar(Request $request)
    {
        $this->model->find($request->id)->delete();

        return ['success' => 'true'];
    }
}
