<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Lista de Tutorías</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white shadow p-6 rounded">
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('admin.tutorias.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Registrar Tutoría
                </a>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Estudiante</th>
                            <th class="px-4 py-2 border">Asignatura</th>
                            <th class="px-4 py-2 border">Horario</th>
                            <th class="px-4 py-2 border">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutorias as $tutoria)
                            <tr>
                                <td class="px-4 py-2 border">{{ $tutoria->idtut }}</td>
                                <td class="px-4 py-2 border">
                                    {{ $tutoria->detalle?->matricula?->estudiante?->nombresest ?? '[Sin nombre]' }}
                                    {{ $tutoria->detalle?->matricula?->estudiante?->apellidosest ?? '' }}
                                </td>
                                <td class="px-4 py-2 border">{{ $tutoria->detalle?->asignatura?->nombreasi ?? '[Sin asignatura]' }}</td>
                                <td class="px-4 py-2 border">
                                    {{ $tutoria->horario?->dia?->nombredia ?? '[Sin día]' }}
                                    {{ $tutoria->horario?->iniciohor ?? '' }} - {{ $tutoria->horario?->finhor ?? '' }}
                                </td>
                                <td class="px-4 py-2 border">{{ $tutoria->detalletut }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
