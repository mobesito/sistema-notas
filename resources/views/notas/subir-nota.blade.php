@vite(['resources/js/importar_notas.js'], 'defer')
<x-layout>
    <x-slot:title>Subir archivo Excel</x-slot:title>
    <x-slot:heading>Subir archivo de notas</x-slot:heading>
    <form method="POST" id="subir_archivo" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFileLg" class="form-label">Subir Excel con notas</label>
            <input id="archivo" class="form-control form-control-lg" name="file" id="formFileLg" type="file" required>

        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Subir</button>
        </div>
        @error('file')
        <h5 style="color: red">{{$message}}</h5>
        @enderror
    </form>
    <a href="{{ url('files/plantilla_notas.xlsx') }}" download>Descargar plantilla</a>
</x-layout>
