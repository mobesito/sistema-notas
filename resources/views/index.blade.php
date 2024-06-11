<x-layout>
    <x-slot:title>Sistema de notas</x-slot:title>
    <x-slot:heading>Bienvenido al panel de administración de notas</x-slot:heading>
    @isset($response)
        <h5>Transacción Realizada:</h5>
        <h5>{{$response}}</h5>
    @endisset
</x-layout>
