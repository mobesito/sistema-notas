<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Agregar materias</x-slot:heading>
    <form id="frmAgregarMateria">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la materia</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Matemáticas" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Agregar">
        <a class="btn btn-light" href="{{route('listarMaterias')}}">Cancelar</a>
    </form>
</x-layout>
@vite(['resources/js/materias.js'], 'defer')
