<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Niveles Académicos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <a href="{{ route('admin.niveles.create') }}" class="btn btn-primary mb-4">
                    ➕ Nuevo Nivel
                </a>

                <table class="table table-bordered table-striped w-full">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Nivel</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($niveles as $nivel)
                            <tr>
                                <td>{{ $nivel->idniv }}</td>
                                <td>{{ $nivel->nombreniv }}</td>
                                <td class="flex gap-2">
                                    <a href="{{ route('admin.niveles.edit', $nivel->idniv) }}"
                                       class="btn btn-warning btn-sm">✏️ Editar</a>

                                    <form action="{{ route('admin.niveles.destroy', $nivel->idniv) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este nivel?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($niveles->isEmpty())
                    <div class="text-center text-gray-600 mt-4">
                        No hay niveles registrados aún.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
