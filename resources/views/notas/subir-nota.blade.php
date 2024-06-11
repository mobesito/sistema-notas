<x-layout>
    <x-slot:title>Subir archivo Excel</x-slot:title>
    <x-slot:heading>Subir archivo de notas</x-slot:heading>
    <form method="POST" action="/notas/import" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="formFileLg" class="form-label">Subir Excel con notas</label>
            <input class="form-control form-control-lg" name="file" id="formFileLg" type="file" required>

        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Subir</button>
        </div>
        @error('file')
            <h5 style="color: red">{{$message}}</h5>
        @enderror

    </form>
</x-layout>
