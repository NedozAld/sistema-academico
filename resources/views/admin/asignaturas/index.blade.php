<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Asignaturas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <a href="{{ route('admin.asignaturas.create') }}"
                   class="btn btn-primary mb-4 inline-block">➕ Nueva Asignatura</a>

                <table class="table table-bordered w-full">
                    <thead class="bg-gray-200">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Titulación</th>
                            <th>Nivel</th>
                            <th>Teóricos</th>
                            <th>Prácticos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asignaturas as $asi)
                            <tr>
                                <td>{{ $asi->idasi }}</td>
                                <td>{{ $asi->nombreasi }}</td>
                                <td>{{ $asi->titulacion->detalletit ?? '—' }}</td>
                                <td>{{ $asi->nivel->nombreniv ?? '—' }}</td>
                                <td>{{ $asi->teoricosasi }}</td>
                                <td>{{ $asi->practicosasi }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500">No hay asignaturas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
