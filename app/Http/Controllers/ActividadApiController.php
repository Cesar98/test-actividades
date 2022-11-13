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
}
