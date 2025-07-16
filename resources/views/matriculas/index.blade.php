<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Matrículas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 text-green-700 bg-green-100 p-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left font-medium">ID Matrícula</th>
                            <th class="px-6 py-3 text-left font-medium">Estudiante</th>
                            <th class="px-6 py-3 text-left font-medium">Periodo</th>
                            <th class="px-6 py-3 text-left font-medium">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($matriculas as $mat)
                            <tr>
                                <td class="px-6 py-2">{{ $mat->idmat }}</td>
                                <td class="px-6 py-2">
                                    {{ $mat->estudiante->nombresest ?? '—' }} {{ $mat->estudiante->apellidosest ?? '' }}
                                </td>
                                <td class="px-6 py-2">{{ $mat->periodo->detalleper ?? '—' }}</td>
                                <td class="px-6 py-2">{{ $mat->fechamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
