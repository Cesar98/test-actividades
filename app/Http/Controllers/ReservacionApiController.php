<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionApiController extends Controller
{

    public function index () {
        $reservaciones = Reservacion::with('actividad')->orderBy('fecha_realizacion');
        return response()->json($reservaciones->get());
    }

    public function reservar (Request $request){

        $actividad = Actividad::find($request->actividad_id);

        Reservacion::create([
            'actividad_id' => $request->actividad_id,
            'numero_total_personas' => $request->personas,
            'precio_total' => $actividad->precio_unitario * $request->personas,
            'fecha_reservacion' => now(),
            'fecha_realizacion' => $request->fecha
        ]);

        return response()->json([
            "success" => "true"
        ]);
    }

}
