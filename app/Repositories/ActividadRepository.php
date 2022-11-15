<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Actividad;

class ActividadRepository
{
    public function __construct()
    {
        $this->model = new Actividad();
    }

    public function actividades(Request $request)
    {
        $actividades = $this->model->where('fecha_disponibilidad_inicio', '<=', $request->fecha)
            ->where('fecha_disponibilidad_fin', '>=', $request->fecha)
            ->orderBy('popularidad', 'desc');

        return $actividades->get();
    }

    public function detalle(Request $request)
    {
        $actividad = $this->model->find($request->actividad_id);

        return [
            'actividad' => $actividad,
            'actividades_relacionadas' => $this->model->find($actividad->actividades_relacionadas)
        ];
    }
}
