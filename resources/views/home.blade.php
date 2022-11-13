@extends('layouts.app')

@section('content')
    <div class="content" id="content_actividades" style="display: block">
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

        <div class="page-inner" id="detalle" style="display: none">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <h4 class="card-title">Detalle de la actividad</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12" id="contenidoDetalle">

                            </div>
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
                                <h4 class="card-title" id="tituloTabla"></h4>
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
    <div class="content" id="content_reservaciones" style="display: none">

        <div class="page-inner" id="reservaciones">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <h4 class="card-title">Reservaciónes realizadas</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 my-3">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Título de la actividad</th>
                                                <th>Fecha de la reservación</th>
                                                <th>Personas a asistir</th>
                                                <th>Precio total pagado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenidoTablaReservaciones">

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
                    construirTabla(respuesta, 'normal');

                    document.getElementById("detalle").style.display = "none";

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

        function construirTabla(elementos, forma) {
            let tabla = document.getElementById('contenidoTabla');
            let numero_personas = document.getElementById('numero_personas').value;

            let elementohtml = '';

            switch (forma) {
                case 'normal':

                    $("#tituloTabla").html('Actividades disponibles en el Estado de México');
                    if (elementos.length > 0) {
                        elementos.forEach(elemento => {

                            elementohtml += `<tr height="250">
                                        <td style="text-align:center">
                                            <img src="${elemento.imagen}" alt="${elemento.titulo}" width="400" height="200" onclick="generarDetalle(${elemento.id})">
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
                    break;

                case 'detalle':
                    $("#tituloTabla").html('Actividades relacionadas disponibles en el Estado de México');
                    if (elementos.length > 0) {
                        elementos.forEach(elemento => {

                            elementohtml += `<tr height="250">
                                        <td style="text-align:center">
                                            <img src="${elemento.imagen}" alt="${elemento.titulo}" width="400" height="200" onclick="generarDetalle(${elemento.id})">
                                        </td>
                                        <td style="text-align:left">
                                            <strong>${elemento.titulo}</strong>
                                        </td>
                                    </tr>`;
                        });
                    } else {
                        elementohtml = `<tr>
                                    <td class="text-center" colspan="3">No hay actividades disponibles en la fecha seleccionada.</td>
                                </tr>`
                    }
                    break;
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

        function generarDetalle(id) {

            let url = window.location.href;
            url = url.replace('public/', 'public/api/actividad/detalle');

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    actividad_id: id,
                },
                success: (respuesta) => {
                    document.getElementById("detalle").style.display = "block";
                    construirDetalle(respuesta.actividad);
                    construirTabla(respuesta.actividades_relacionadas, 'detalle');
                },
                error: () => {},
            });
        }

        function construirDetalle(elemento) {
            let div = document.getElementById('contenidoDetalle');
            let numero_personas = document.getElementById('numero_personas').value;
            let fecha_busqueda = document.getElementById('fecha_busqueda').value;

            let elementohtml = '';

            elementohtml += `<div class="row justify-content-md-center">
                                <div class="col-8 col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="${elemento.imagen}"
                                                alt="${elemento.titulo}" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-head-row">
                                                <div class="card-title">${elemento.titulo}</div>
                                            </div>
                                        </div>

                                        <div class="card-body pb-0">
                                            <div class="text-center my-2">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star-half"></span>
                                            </div>

                                            <div class="d-flex">
                                                <div class="flex-1 pt-1 ml-2">
                                                    <p>${elemento.descripcion}</p>
                                                </div>
                                            </div>

                                            <div class="d-flex">
                                                <div class="flex-1 pt-1 ml-2">
                                                    <small>Fecha tentativa: ${fecha_busqueda}</small>
                                                </div>
                                            </div>

                                            <div class="d-flex">
                                                <div class="flex-1 pt-1 ml-2">
                                                    <p>Cantidad de personas a asistir: ${numero_personas}</p>
                                                </div>
                                                <div class="d-flex ml-auto align-items-center">
                                                    <h3 class="text-info fw-bold">$ ${elemento.precio_unitario * numero_personas} mxn.</h3>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <div class="col-md-auto">
                                                    <button class="btn btn-success"
                                                        onclick="generarReservacion(${elemento.id}, ${numero_personas})">
                                                        <span class="btn-label">
                                                            <i class="fa fa-money-check-alt"></i>
                                                        </span>Comprar
                                                    </button>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>`;



            div.innerHTML = elementohtml;
        }

        function cambiarContenido(nav) {
            let navActividades = document.getElementById("nav_actividades");
            let navReservaciones = document.getElementById("nav_reservaciones");

            let contentActividades = document.getElementById("content_actividades");
            let contentReservaciones = document.getElementById("content_reservaciones");


            if (nav.id == navActividades.id) {
                location.reload();

                navActividades.classList.add("active");
                navReservaciones.classList.remove("active");

                contentActividades.style.display = "block";
                contentReservaciones.style.display = "none";

            } else {
                navReservaciones.classList.add("active");
                navActividades.classList.remove("active");

                contentActividades.style.display = "none";
                contentReservaciones.style.display = "block";

                generarReservaciones();
            }
        }

        function generarReservaciones() {

            let url = window.location.href;
            url = url.replace('public/', 'public/api/reservaciones');

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {},
                success: (respuesta) => {
                    console.log(respuesta)
                    construirReservaciones(respuesta);
                },
                error: () => {},
            });
        }

        function construirReservaciones(elementos) {
            let tabla = document.getElementById('contenidoTablaReservaciones');
            let elementohtml = '';
            if (elementos.length > 0) {
                elementos.forEach(elemento => {
                    elementohtml += `<tr height="250">
                                        <td style="text-align:center">
                                            <img src="${elemento.actividad.imagen}" alt="${elemento.actividad.titulo}" width="400" height="200">
                                        </td>
                                        <td style="text-align:left">
                                            ${elemento.actividad.titulo}
                                        </td>
                                        <td style="text-align:left">
                                            ${elemento.fecha_realizacion}
                                        </td>
                                        <td style="text-align:left">
                                            ${elemento.numero_total_personas} personas
                                        </td>
                                        <td style="text-align:left">
                                            $ ${elemento.precio_total} mxn
                                        </td>
                                        <td style="text-align:left">
                                            Cancelar reservacion
                                        </td>
                                    </tr>`;
                });
            } else {
                elementohtml = `<tr>
                                    <td class="text-center" colspan="6">No hay actividades reservadas en este momento.</td>
                                </tr>`;
            }
            tabla.innerHTML = elementohtml;
        }
    </script>
@endsection
