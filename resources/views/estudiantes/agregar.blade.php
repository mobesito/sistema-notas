<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Agregar estudiante</x-slot:heading>
    <form id="frmAgregarEstudiante">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del estudiante</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Juan" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Pérez" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Agregar">
        <a class="btn btn-light" href="{{route('listarEstudiantes')}}">Cancelar</a>
    </form>
</x-layout>
@vite(['resources/js/estudiantes.js'], 'defer')
