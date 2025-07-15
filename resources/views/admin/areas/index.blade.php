<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Áreas Registradas') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Formulario para registrar nueva área (inline) --}}
            <div class="bg-white shadow-xl rounded-lg p-6 mb-8">
                <h3 class="text-2xl font-extrabold text-gray-800 mb-6 text-center">
                    Añadir Nueva Área
                </h3>
                <form action="{{ route('admin.areas.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                        {{-- Campo Nombre del Área --}}
                        <div>
                            <label for="nombreare_new" class="block text-gray-700 text-sm font-bold mb-2">
                                Nombre del Área:
                            </label>
                            <input
                                type="text"
                                name="nombreare"
                                id="nombreare_new"
                                placeholder="Ej: Soporte Técnico"
                                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                                required
                            >
                            @error('nombreare')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Selector de Departamento --}}
                        <div>
                            <label for="iddep_new" class="block text-gray-700 text-sm font-bold mb-2">
                                Departamento:
                            </label>
                            <select
                                name="iddep"
                                id="iddep_new"
                                class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                                required
                            >
                                <option value="">-- Seleccione --</option>
                                @foreach(App\Models\Departamento::all() as $dep)
                                    <option value="{{ $dep->iddep }}">{{ $dep->nombredep }}</option>
                                @endforeach
                            </select>
                            @error('iddep')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Botón Guardar --}}
                        <div class="md:col-span-1 flex justify-end md:justify-start mt-4 md:mt-0">
                            <button
                                type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-6 rounded-full flex items-center shadow-lg transition duration-300 ease-in-out transform hover:scale-105"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Guardar Área
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Listado de Áreas --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-extrabold text-gray-800 mb-6">Listado de Áreas Registradas</h3>

                    @if($areas->isEmpty())
                        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md" role="alert">
                            <p class="font-bold">¡Atención!</p>
                            <p>No hay áreas registradas todavía. Utiliza el formulario de arriba para añadir una.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nombre del Área
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Departamento
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($areas as $area)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $area->idare }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <form action="{{ route('admin.areas.update', $area->idare) }}" method="POST" class="inline-block w-full">
                                                    @csrf
                                                    @method('PUT')
                                                    <input
                                                        type="text"
                                                        name="nombreare"
                                                        value="{{ $area->nombreare }}"
                                                        class="border-none focus:ring-1 focus:ring-blue-500 rounded-md w-full bg-transparent hover:bg-gray-100 transition duration-150 ease-in-out"
                                                    >
                                                    {{-- Botón de actualizar para el nombre del área --}}
                                                    <button type="submit" class="hidden"></button> {{-- Oculto, se puede activar con JS o al perder el foco --}}
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <form action="{{ route('admin.areas.update', $area->idare) }}" method="POST" class="inline-block w-full">
                                                    @csrf
                                                    @method('PUT')
                                                    <select
                                                        name="iddep"
                                                        class="border-none focus:ring-1 focus:ring-blue-500 rounded-md w-full bg-transparent hover:bg-gray-100 transition duration-150 ease-in-out"
                                                    >
                                                        @foreach(App\Models\Departamento::all() as $dep)
                                                            <option value="{{ $dep->iddep }}" {{ $area->iddep == $dep->iddep ? 'selected' : '' }}>
                                                                {{ $dep->nombredep }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- Botón de actualizar para el departamento --}}
                                                    <button type="submit" class="hidden"></button> {{-- Oculto, se puede activar con JS o al perder el foco --}}
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                {{-- Botón de Actualizar explícito (si se prefiere sobre el auto-guardado) --}}
                                                <form action="{{ route('admin.areas.update', $area->idare) }}" method="POST" class="inline-block mr-2">
                                                    @csrf
                                                    @method('PUT')
                                                    {{-- Asegúrate de pasar los valores actuales si no se usan campos directos --}}
                                                    <input type="hidden" name="nombreare" value="{{ $area->nombreare }}">
                                                    <input type="hidden" name="iddep" value="{{ $area->iddep }}">
                                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">
                                                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                        Actualizar
                                                    </button>
                                                </form>

                                                {{-- Botón de Eliminar --}}
                                                <form action="{{ route('admin.areas.destroy', $area->idare) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta área?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
