<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Lista de Horarios
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('admin.horarios.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Crear Horario
                </a>

                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Día</th>
                            <th class="py-2 px-4 border-b">Hora de Inicio</th>
                            <th class="py-2 px-4 border-b">Hora de Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($horarios as $horario)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $horario->idhor }}</td>
                                <td class="py-2 px-4 border-b">{{ $horario->dia->nombredia ?? 'Día no asignado' }}</td>
                                <td class="py-2 px-4 border-b">{{ $horario->iniciohor }}</td>
                                <td class="py-2 px-4 border-b">{{ $horario->finhor }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">
                                    No hay horarios registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
