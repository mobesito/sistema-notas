import $ from 'jquery';
import Swal from 'sweetalert2';
window.$ = $;
window.jQuery = $;


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#subir_archivo").on("submit", function(){
        event.preventDefault();
        let data = new FormData(document.getElementById("subir_archivo"));
        $.ajax({
            url: "/notas/import",
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                switch(response.estado){
                    case "null":
                        Swal.fire({
                            title: 'Ups!',
                            text: response.mensaje,
                            icon: 'info',
                            confirmButtonText: 'Aceptar'
                        });
                        break;
                    case "exito":
                        Swal.fire({
                            title: 'Éxito!',
                            text: response.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                        break;
                    case "error":
                        Swal.fire({
                            title: 'Error!',
                            text: response.mensaje,
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                        break;
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
