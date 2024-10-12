import $ from 'jquery';
import Swal from 'sweetalert2';
window.$ = $;
window.jQuery = $;
import 'datatables.net-dt/css/dataTables.dataTables.css';
import 'datatables.net';

$(document).ready(function(){
    $("#tabla_estudiantes").DataTable({
        responsive: true,
        language: {
            "lengthMenu": "Mostrar _MENU_ entradas por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "emptyTable": "No hay datos disponibles en la tabla",
            "loadingRecords": "Cargando...",
            "processing": "Procesando..."
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#frmAgregarEstudiante").on("submit", function(e){
        e.preventDefault();
        let data = new FormData(document.getElementById("frmAgregarEstudiante"));
        $.ajax({
            url: "/estudiantes/agregar",
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
                    });
                }
                else{
                    Swal.fire({
                        title: 'Ups',
                        text: 'Ocurrió un problema agregando el estudiante',
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
});
