<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadApiController extends Controller
{

    public function index(){
        $actividades = Actividad::all();
        return response()->json([
            "success" => "true",
            "results" => $actividades
        ]);
    }

    public function actividades (Request $request){

        $actividades = Actividad::where('fecha_disponibilidad_inicio', '<=', $request->fecha)
                                    ->where('fecha_disponibilidad_fin', '>=', $request->fecha)
                                    ->orderBy('popularidad', 'desc');

        return response()->json($actividades->get());
    }

    public function detalle (Request $request){

        $actividad = Actividad::find($request->actividad_id);

        $actividades_relacionadas = Actividad::whereIn('id', $actividad->actividades_relacionadas);
        return response()->json([
            "actividad" => $actividad,
            "actividades_relacionadas" => $actividades_relacionadas->get()
        ]);

    }
}
