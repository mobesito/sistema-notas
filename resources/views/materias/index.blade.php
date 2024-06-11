<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Materias</x-slot:heading>
    <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Opción</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($materias as $materia)
                <tr>
                    <th scope="row">{{$materia->id}}</th>
                    <td>{{$materia->nombre_materia}}</td>
                    <td><a href="/materias/notas/{{$materia->id}}">Ver notas</a></td>
                </tr>
            @endforeach
          </tbody>
    </table>
</x-layout>
