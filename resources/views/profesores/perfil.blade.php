<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Perfil del Profesor') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-200">
            <h3 class="text-2xl font-semibold text-gray-700 mb-6">Información Personal</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-800">
                <div><strong>Nombre:</strong> {{ $profesor->nombrespro }} {{ $profesor->apellidospro }}</div>
                <div><strong>Cédula:</strong> {{ $profesor->idpro }}</div>
                <div><strong>Correo Institucional:</strong> {{ $profesor->correopro }}</div>
                <div><strong>Área:</strong> {{ $profesor->area->nombreare ?? 'No asignada' }}</div>
                <div><strong>Teléfono:</strong> {{ $profesor->telefonopro ?? 'No registrado' }}</div>

            </div>
        </div>
    </div>
</x-app-layout>
