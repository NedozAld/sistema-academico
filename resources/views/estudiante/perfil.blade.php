<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil del Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Información Personal</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><strong>Cédula:</strong> {{ $estudiante->idest }}</div>
                    <div><strong>Nombre:</strong> {{ $estudiante->nombresest }} {{ $estudiante->apellidosest }}</div>
                    <div><strong>Dirección:</strong> {{ $estudiante->direccionest }}</div>
                    <div><strong>Email:</strong> {{ $estudiante->mailest }}</div>
                    <div><strong>Fecha de Nacimiento:</strong> {{ $estudiante->nacimientoest }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
