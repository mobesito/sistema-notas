@vite(['resources/js/estudiantes.js'], 'defer')
<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Estudiantes</x-slot:heading>
    <div class="mb-3">
        <a class="btn btn-success btn-sm" href="/estudiantes/agregar">Agregar <svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg></a>
    </div>
    <table class="table table-striped table-responsive" id="tabla_estudiantes" style="width: 600px;">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Opción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
            <tr>
                <th scope="row">{{$estudiante->id}}</th>
                <td>{{$estudiante->nombre}}</td>
                <td>{{$estudiante->apellido}}</td>
                <td><a href="/estudiantes/notas/{{$estudiante->id}}">Ver notas</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
