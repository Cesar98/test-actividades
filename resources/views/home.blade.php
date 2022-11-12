@extends('layouts.app')

@section('content')
    <div class="page-inner my-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Bienvenido</h2>
                <h5 class="text-white op-7 mb-2">Reserva de actividades en Toluca Edo. Mex.</h5>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="col-md-12 my-3">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Encuentra tu actuvidad preferida</div>
                    </div>
                </div>
                <div class="card-body">
                    {!! BootForm::open() !!}
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="fecha">Fecha de la reservación</label>
                                <input type="date" name="fecha" {{-- onchange="validarCamposBusqueda(this)" --}} id="fecha"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="personas">Total de personas a asistir</label>
                                <input type="number" name="personas" {{-- onchange="validarCamposBusqueda(this)" --}} id="personas"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>

                    {!! BootForm::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
