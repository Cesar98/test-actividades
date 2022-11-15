<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ReservacionRepository;
use Illuminate\Http\Request;

class ReservacionesController extends Controller
{
    public function __construct(ReservacionRepository $reservacionRepository)
    {
        $this->reservacionRepository = $reservacionRepository;
    }

    public function reservaciones()
    {
        return response()->json($this->reservacionRepository->reservaciones());
    }

    public function reservar(Request $request)
    {
        return response()->json($this->reservacionRepository->reservar($request));
    }

    public function cancelar(Request $request)
    {
        return response()->json($this->reservacionRepository->cancelar($request));
    }
}
