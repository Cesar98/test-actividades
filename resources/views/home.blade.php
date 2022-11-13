@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-12 my-3">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Encuentra una actividad en Toluca Edo. Mex.</div>
                    </div>
                </div>
                <div class="card-body">
                    {!! BootForm::open() !!}
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-3">
                            <div class="form-group">
                                <label class="control-label" for="fecha_busqueda">Fecha de la actividad</label>
                                <input type="date" name="fecha_busqueda" min={!! now() !!}
                                    value={!! now() !!} id="fecha_busqueda" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-3">
                            <div class="form-group">
                                <label class="control-label" for="numero_personas">Total de personas a asistir</label>
                                <input type="number" name="numero_personas" min="1" value="1"
                                    id="numero_personas" class="form-control">
                            </div>
                        </div>
                    </div>

                    {!! BootForm::close() !!}

                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                            <button class="btn btn-info" onclick="generarBusqueda()">
                                <span class="btn-label">
                                    <i class="fa fa-search"></i>
                                </span>
                                Buscar
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="page-inner" id="resultados" style="display: none">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <h4 class="card-title">Ve las actividades que puedes hacer en Toluca</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 my-3">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table">
                                        <tbody id="contenidoTabla">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function generarBusqueda() {

            let fecha_busqueda = document.getElementById('fecha_busqueda').value;
            let numero_personas = document.getElementById('numero_personas').value;

            if (numero_personas <= 0) {
                $.notify({
                    icon: 'flaticon-alarm-1',
                    title: 'Error',
                    message: 'El total de personas a asistir debe ser un numero mayor a 0',
                }, {
                    type: 'danger',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                });
                return;
            }

            let url = window.location.href;
            url = url.replace('public/', 'public/api/actividades');

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    fecha: fecha_busqueda,
                    personas: numero_personas
                },
                success: (respuesta) => {
                    construirTabla(respuesta);

                    document.getElementById("resultados").style.display = "block";

                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Éxito',
                        message: 'Éxito al generar la busqueda',
                    }, {
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                },
                error: () => {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Error',
                        message: 'Error al generar la busqueda',
                    }, {
                        type: 'danger',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                },
            });


        }

        function construirTabla(elementos) {
            let tabla = document.getElementById('contenidoTabla');
            let numero_personas = document.getElementById('numero_personas').value;

            let elementohtml = '';
            if (elementos.length > 0) {
                elementos.forEach(elemento => {
                    elementohtml += `<tr height="250">
                                        <td style="text-align:center">
                                            <img src="${elemento.imagen}" alt="${elemento.titulo}" width="400" height="200">
                                        </td>
                                        <td style="text-align:left">
                                            <strong>${elemento.titulo}</strong>
                                            <br />
                                            Total: $ ${elemento.precio_unitario * numero_personas} mxn
                                        </td>
                                        <td style="text-align:right">
                                            <button class="btn btn-success" onclick="generarReservacion(${elemento.id}, ${numero_personas})">
                                                <span class="btn-label">
                                                    <i class="fa fa-money-check-alt"></i>
                                                </span>Comprar
                                            </button>
                                        </td>
                                    </tr>`;
                });
            } else {
                elementohtml = `<tr>
                                    <td class="text-center" colspan="3">No hay actividades disponibles en la fecha seleccionada.</td>
                                </tr>`
            }
            tabla.innerHTML = elementohtml;
        }

        function generarReservacion(id, numero_personas) {
            let fecha_busqueda = document.getElementById('fecha_busqueda').value;

            let url = window.location.href;
            url = url.replace('public/', 'public/api/reservar');

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    actividad_id: id,
                    personas: numero_personas,
                    fecha: fecha_busqueda
                },
                success: (respuesta) => {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Éxito',
                        message: 'La reservación se realizó correctamente',
                    }, {
                        type: 'success',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                },
                error: () => {
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Error',
                        message: 'La reservación no se realizó correctamente',
                    }, {
                        type: 'danger',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                    });
                },
            });
        }
    </script>
@endsection
