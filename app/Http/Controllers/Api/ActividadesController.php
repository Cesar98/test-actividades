<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function actividades (Request $request){

        $actividades = Actividad::where('fecha_disponibilidad_inicio', '<=', $request->fecha)
                                    ->where('fecha_disponibilidad_fin', '>=', $request->fecha)
                                    ->orderBy('popularidad', 'desc');

        return response()->json($actividades->get());
    }

    public function detalle (Request $request){

        $actividad = Actividad::find($request->actividad_id);

        $actividades_relacionadas = Actividad::whereIn('id', json_decode($actividad->actividades_relacionadas));

        return response()->json([
            "actividad" => $actividad,
            "actividades_relacionadas" => $actividades_relacionadas->get()
        ]);

    }
}
