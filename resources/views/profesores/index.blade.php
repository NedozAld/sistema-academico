<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Profesores') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4 flex justify-end">
                    <a href="{{ route('admin.profesores.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Nuevo Profesor
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border">Cédula</th>
                                <th class="px-4 py-2 border">Nombres</th>
                                <th class="px-4 py-2 border">Apellidos</th>
                                <th class="px-4 py-2 border">Teléfono</th>
                                <th class="px-4 py-2 border">Correo</th>
                                <th class="px-4 py-2 border">Área</th>
                                <th class="px-4 py-2 border">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($profesores as $profesor)
                                <tr class="text-center border-t">
                                    <td class="px-4 py-2 border">{{ $profesor->idpro }}</td>
                                    <td class="px-4 py-2 border">{{ $profesor->nombrespro }}</td>
                                    <td class="px-4 py-2 border">{{ $profesor->apellidospro }}</td>
                                    <td class="px-4 py-2 border">{{ $profesor->telefonopro }}</td>
                                    <td class="px-4 py-2 border">{{ $profesor->correopro }}</td>
                                    <td class="px-4 py-2 border">{{ $profesor->area->nombreare ?? '-' }}</td>
                                    <td class="px-4 py-2 border space-x-2">
                                        <a href="{{ route('admin.profesores.edit', $profesor->idpro) }}"
                                           class="text-blue-600 hover:underline">Editar</a>

                                        <form action="{{ route('admin.profesores.destroy', $profesor->idpro) }}"
                                              method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este profesor?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:underline">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">No hay profesores registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
