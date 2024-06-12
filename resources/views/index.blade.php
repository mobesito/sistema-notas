<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Bienvenido al panel de administración de notas</x-slot:heading>
    @isset($success)
        <h5>Respuesta:</h5>
        <h5 style="color: green">{{$success}}</h5>
    @endisset
    @isset($info_message)
        <h5>Respuesta:</h5>
        <h5 style="color: gray">{{$info_message}}</h5>
    @endisset
    @isset($error_message)
        <h5>Respuesta:</h5>
        <h5 style="color: red">{{$error_message}}</h5>
        {{-- <h6>{{$error}}</h6> --}}
    @endisset
</x-layout>
