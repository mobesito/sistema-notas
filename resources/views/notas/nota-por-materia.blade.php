<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Notas de {{$materia->nombre_materia}}</x-slot:heading>
    @isset($notasDeMateria)
    <a href="/materias">Volver</a>
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th scope="col">#id estudiante</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nota 1</th>
                <th scope="col">Nota 2</th>
                <th scope="col">Nota 3</th>
                <th scope="col">Nota 4</th>
                <th scope="col">Nota 5</th>
                <th scope="col">Nota 6</th>
                <th scope="col">Nota 7</th>
                <th scope="col">Nota 8</th>
                <th scope="col">Nota 9</th>
                <th scope="col">Nota 10</th>
                <th scope="col">Nota Final</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notasDeMateria as $nota)
            <tr>
                <th scope="row">{{$nota->estudiante->id}}</th>
                <td>{{$nota->estudiante->nombre}} {{$nota->estudiante->apellido}}</td>
                <td>{{$nota->nota_1}}</td>
                <td>{{$nota->nota_2}}</td>
                <td>{{$nota->nota_3}}</td>
                <td>{{$nota->nota_4}}</td>
                <td>{{$nota->nota_5}}</td>
                <td>{{$nota->nota_6}}</td>
                <td>{{$nota->nota_7}}</td>
                <td>{{$nota->nota_8}}</td>
                <td>{{$nota->nota_9}}</td>
                <td>{{$nota->nota_10}}</td>
                <td>{{$nota->nota_final}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endisset

</x-layout>
