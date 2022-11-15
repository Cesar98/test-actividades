<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ActividadRepository;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function __construct(ActividadRepository $actividadRepository)
    {
        $this->actividadRepository = $actividadRepository;
    }

    public function actividades(Request $request)
    {
        return response()->json($this->actividadRepository->actividades($request));
    }

    public function detalle(Request $request)
    {
        return response()->json($this->actividadRepository->detalle($request));
    }
}
