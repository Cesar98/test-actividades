@extends('layouts.app')

@section('content')
    <div class="content" id="content_actividades" style="display: block">
        <div class="col-md-6 m-auto">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row justify-content-md-center">
                        <div class="card-title">Encuentra qué hacer en Toluca</div>
                    </div>
                </div>
                <div class="card-body">
                    {!! BootForm::open() !!}
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-3">
                            <div class="form-group">
                                <label class="control-label" for="fecha_busqueda">¿Qué día quieres explorar?</label>
                                <input type="date" name="fecha_busqueda" min={!! now() !!}
                                    value={!! now() !!} id="fecha_busqueda" class="form-control">
                            </div>
                        </div>
                        <div class="col col-lg-3">
                            <div class="form-group">
                                <label class="control-label" for="numero_personas">¿Cuántas personas más vienen
                                    contigo?</label>
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
            <div class="row row-card-no-pd ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row justify-content-md-center">
                                <div class="card-title">Datos interesantes sobre la actividad</div>
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
                            <div class="card-head-row justify-content-md-center">
                                <div class="card-title" id="tituloTabla">Actividades que quizás te puedan interesar</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12" id="contenidoTabla">

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
                            <div class="col-md-12" id="contenidoTablaReservaciones">

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
        function notificacion(titulo, mensaje, tipo) {

            $.notify({
                icon: tipo == 'danger' ? 'flaticon-cross-1' : 'flaticon-check',
                title: titulo,
                message: mensaje,
            }, {
                type: tipo == 'danger' ? 'danger' : 'success',
                placement: {
                    from: "top",
                    align: "right"
                },
                time: 1000,
            });

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
                generarReservaciones();

                navReservaciones.classList.add("active");
                navActividades.classList.remove("active");

                contentActividades.style.display = "none";
                contentReservaciones.style.display = "block";
            }

        }

        function generarBusqueda() {

            let fecha_busqueda = document.getElementById('fecha_busqueda').value;
            let numero_personas = document.getElementById('numero_personas').value;

            if (numero_personas <= 0) {
                notificacion('Error', 'El total de personas a asistir debe ser un número mayor a 0', 'danger')
                return;
            }

            let url = window.location.href;
            console.log(url);
            url = url.replace('herokuapp.com/', 'herokuapp.com/api/actividades');

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    fecha: fecha_busqueda,
                    personas: numero_personas
                },
                success: (respuesta) => {
                    construirTablaActividades(respuesta, 'normal');

                    document.getElementById("detalle").style.display = "none";
                    document.getElementById("resultados").style.display = "block";

                    notificacion('Éxito', 'Éxito al generar la búsqueda', 'success');
                },
                error: () => {
                    notificacion('Error', 'Error al generar la búsqueda', 'danger');
                },
            });

        }

        function generarReservacion(id, numero_personas) {

            swal({
                title: "¡Espera!",
                text: "¿Estás seguro de querer realizar la reservación?",
                icon: "info",
                button: "Sí, estoy seguro",
            }).then((value) => {
                if (value) {
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
                            notificacion('Éxito', 'Se realizó la reservacion correctamente', 'success');
                        }
                    });
                }
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
                    construirTablaActividades(respuesta.actividades_relacionadas, 'detalle');
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                },
                error: () => {},
            });

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
                    construirTablaReservaciones(respuesta);
                }
            });

        }

        function generarCancelacionReservacion(id) {

            swal({
                title: "¡Espera!",
                text: "¿Estás seguro de querer cancelar la reserva?",
                icon: "info",
                button: "Sí, estoy seguro",
            }).then((value) => {
                if (value) {
                    let url = window.location.href;
                    url = url.replace('public/', 'public/api/reservaciones/cancelar');

                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: (respuesta) => {
                            notificacion('Éxito', 'Se canceló la reservación', 'success');
                            generarReservaciones();
                        }
                    });
                }
            });

        }

        function construirTablaActividades(elementos, forma) {

            let tabla = document.getElementById('contenidoTabla');
            let numero_personas = document.getElementById('numero_personas').value;
            let elemento_html = '';

            if (elementos.length == 0) {
                elemento_html = `<div class="row justify-content-md-center">
                                    No hay actividades reservadas en este momento.
                                </div>`;
            }

            switch (forma) {
                case 'normal':

                    elementos.forEach(elemento => {
                        let texto_precio = elemento.precio_unitario == 0 ? 'Es GRATIS!' :
                            `$ ${elemento.precio_unitario * numero_personas} mxn.`;

                        elemento_html += `<div class="row justify-content-md-center">
                                                <div class="col-6 col-md-6">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <img src="${elemento.imagen}"
                                                                alt="${elemento.titulo}" width="50%"
                                                                onclick="generarDetalle(${elemento.id})">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-head-row justify-content-md-center">
                                                                <div class="card-title">${elemento.titulo}</div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body pb-0">
                                                            <div class="text-center my-5">
                                                                <h3 class="text-info fw-bold">${texto_precio}</h3>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="col-md-auto">
                                                                    <button class="btn btn-success" onclick="generarReservacion(${elemento.id}, ${numero_personas})">
                                                            <span class="btn-label">
                                                                <i class="fa fa-money-check-alt"></i>
                                                            </span>
                                                            Comprar
                                                        </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;
                    });

                    break;

                case 'detalle':

                    elementos.forEach(elemento => {
                        let texto_precio = elemento.precio_unitario == 0 ? 'Es GRATIS!' :
                            `$ ${elemento.precio_unitario * numero_personas} mxn.`;

                        elemento_html += `<div class="row justify-content-md-center">
                                                <div class="col-6 col-md-6" style="display: flex; justify-content: center; align-items: center;">
                                                    <div class="card text-center">
                                                        <div class="card-title">${elemento.titulo}</div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <img src="${elemento.imagen}"
                                                                alt="${elemento.titulo}" width="50%"
                                                                onclick="generarDetalle(${elemento.id})">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;
                    });

                    break;

            }

            tabla.innerHTML = elemento_html;

        }

        function construirDetalle(elemento) {

            let div = document.getElementById('contenidoDetalle');
            let numero_personas = document.getElementById('numero_personas').value;
            let fecha_busqueda = document.getElementById('fecha_busqueda').value;
            let elemento_html = '';
            let texto_precio = elemento.precio_unitario == 0 ? 'Completamente GRATIS!' :
                `$ ${elemento.precio_unitario * numero_personas} mxn.`;

            elemento_html += `<div class="row justify-content-md-center">
                                <div class="col-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="${elemento.imagen}"
                                                alt="${elemento.titulo}" width="70%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
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
                                                    <h3 class="text-info fw-bold">${texto_precio}</h3>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="col-md-auto">
                                                    <button class="btn btn-success"
                                                        onclick="generarReservacion(${elemento.id}, ${numero_personas})">
                                                        <span class="btn-label">
                                                            <i class="fa fa-money-check-alt"></i>
                                                        </span>
                                                        Comprar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

            div.innerHTML = elemento_html;

        }

        function construirTablaReservaciones(elementos) {

            let tabla = document.getElementById('contenidoTablaReservaciones');
            let numero_personas = document.getElementById('numero_personas').value;
            let fecha_busqueda = document.getElementById('fecha_busqueda').value;
            let elemento_html = '';

            if (elementos.length == 0) {
                elemento_html = `<div class="row justify-content-md-center">
                                    No hay actividades reservadas en este momento.
                                </div>`;
            }

            elementos.forEach(elemento => {
                let texto_precio = elemento.actividad.precio_unitario == 0 ? 'Fue GRATIS!' :
                    `$ ${elemento.precio_total} mxn.`;
                let texto_personas = elemento.numero_total_personas == 1 ?
                    'persona' : 'personas';

                elemento_html += `<div class="row justify-content-md-center">
                                        <div class="col-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <img src="${elemento.actividad.imagen}"
                                                        alt="${elemento.actividad.titulo}" width="70%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-head-row">
                                                        <div class="card-title">${elemento.actividad.titulo}</div>
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
                                                            <p>${elemento.actividad.descripcion}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-1 pt-1 ml-2">
                                                            <small>Fecha a asistir: ${fecha_busqueda}</small>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-1 pt-1 ml-2">
                                                            <p>Total de personas a asistir: ${numero_personas}</p>
                                                        </div>
                                                        <div class="d-flex ml-auto align-items-center">
                                                            <h3 class="text-info fw-bold">${texto_precio}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="col-md-auto">
                                                            <button class="btn btn-danger"
                                                                onclick="generarCancelacionReservacion(${elemento.id})">
                                                                <span class="btn-label">
                                                                    <i class="far fa-calendar-times"></i>
                                                                </span>
                                                                Cancelar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
            });

            tabla.innerHTML = elemento_html;

        }
    </script>
@endsection
