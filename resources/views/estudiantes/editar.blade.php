<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Editar estudiante</x-slot:heading>
    <form id="frmEditarEstudiante">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del estudiante</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{$estudiante->nombre}}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido" value="{{$estudiante->apellido}}" required>
        </div>
        <input type="hidden" name="id" value="{{$estudiante->id}}">
        <input type="submit" class="btn btn-primary" value="Editar">
        <a class="btn btn-light" href="{{route('listarEstudiantes')}}">Cancelar</a>
    </form>
</x-layout>
@vite(['resources/js/estudiantes.js'], 'defer')
