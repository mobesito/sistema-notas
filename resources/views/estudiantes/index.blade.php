<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Estudiantes</x-slot:heading>
    <table class="table table-striped">
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
