import $ from 'jquery';
import Swal from 'sweetalert2';
window.$ = $;
window.jQuery = $;
import 'datatables.net-dt/css/dataTables.dataTables.css';
import 'datatables.net';

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#frmAgregarMateria").on("submit", function(e){
        e.preventDefault();
        let data = new FormData(document.getElementById("frmAgregarMateria"));
        $.ajax({
            url: "/materias/agregar",
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if(response.estado === "exito"){
                    Swal.fire({
                        title: 'Éxito',
                        text: response.mensaje,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            window.location.href = "/materias";
                        }
                    });
                }
                else{
                    Swal.fire({
                        title: 'Ups',
                        text: 'Ocurrió un problema agregando la materia',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                   });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: xhr.responseText,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

    $("#frmEditarMateria").on("submit", function(e){
        e.preventDefault();
        let data = new FormData(document.getElementById("frmEditarMateria"));
        const id = data.get("id");
        $.ajax({
            url: `/materias/editar/${id}`,
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if(response.estado === "exito"){
                    Swal.fire({
                        title: 'Éxito',
                        text: response.mensaje,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            window.location.href = "/materias";
                        }
                    });
                }
                else{
                    Swal.fire({
                        title: 'Ups',
                        text: 'Ocurrió un problema editando la materia',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                   });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: xhr.responseText,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

    $(".btn-eliminar").on("click", function(e){
        e.preventDefault();
        let id = $(this).data("id");
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/materias/eliminar/${id}`,
                    type: 'POST',
                    data: {
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        if(response.estado === "exito"){
                            Swal.fire(
                                '¡Eliminado!',
                                response.mensaje,
                                'success'
                            ).then(() => {
                                window.location.href = "/materias";
                            });
                        } else {
                            Swal.fire('Ups', response.mensaje, 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', xhr.responseText, 'error');
                    }
                });
            }
        });
    });
});
