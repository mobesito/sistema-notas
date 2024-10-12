<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Bienvenido al panel de administración de notas</x-slot:heading>
    @isset($success)
    <h5>Respuesta:</h5>
    <h5 style="color: green">{{$success}}</h5>
    @endisset
    @isset($info_message)
    <h5>Respuesta:</h5>
    <h5 style="color: gray">{{$info_message}}</h5>
    @endisset
    @isset($error_message)
    <h5>Respuesta:</h5>
    <h5 style="color: red">{{$error_message}}</h5>
    {{-- <h6>{{$error}}</h6> --}}
    @endisset
    <br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-file-spreadsheet" viewBox="0 0 16 16">
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v4h10V2a1 1 0 0 0-1-1zm9 6h-3v2h3zm0 3h-3v2h3zm0 3h-3v2h2a1 1 0 0 0 1-1zm-4 2v-2H6v2zm-4 0v-2H3v1a1 1 0 0 0 1 1zm-2-3h2v-2H3zm0-3h2V7H3zm3-2v2h3V7zm3 3H6v2h3z" />
                    </svg> Plantilla Excel </div>
                <div class="card-body">
                    <p class="card-title" style="">Plantilla para subir notas </p><a class="btn btn-success btn-sm"
                        href="{{ url('files/plantilla_notas.xlsx') }}" download>Descargar <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-download" viewBox="0 0 16 16">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                            <path
                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                        </svg></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                    </svg> Estudiantes </div>
                <div class="card-body">
                    <h5 class="card-title">Total de estudiantes: </h5>
                    <p class="card-text">{{$total_estudiantes}}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path
                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                    </svg> Materias</div>
                <div class="card-body">
                    <h5 class="card-title">Total de materias: </h5>
                    <p class="card-text">{{$total_materias}}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
