<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Editar materia</x-slot:heading>
    <form id="frmEditarMateria">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la materia</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{$materia->nombre_materia}}" required>
        </div>
        <input type="hidden" name="id" value="{{$materia->id}}">
        <input type="submit" class="btn btn-primary" value="Editar">
        <a class="btn btn-light" href="{{route('listarMaterias')}}">Cancelar</a>
    </form>
</x-layout>
@vite(['resources/js/materias.js'], 'defer')
