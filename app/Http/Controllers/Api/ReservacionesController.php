<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionesController extends Controller
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

    public function cancelar (Request $request){
        $reservacion = Reservacion::find($request->id);
        $reservacion->delete();

        return response()->json([
            "success" => "true"
        ]);
    }
}
