<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Registrar Matrícula') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-purple-50 to-pink-100 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-3xl w-full mx-auto">
            <div class="bg-white shadow-2xl rounded-xl p-8 transform transition-all duration-300 hover:scale-[1.01]">

                <h3 class="text-2xl font-extrabold text-gray-900 mb-6 text-center">
                    Selecciona Titulación y Nivel
                </h3>

                {{-- Selección de Titulación y Nivel --}}
                <form method="GET" action="{{ route('admin.matriculas.create') }}" class="mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="idtit" class="block text-gray-700 text-sm font-bold mb-2">Titulación:</label>
                            <select id="idtit" name="idtit" onchange="this.form.submit()"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-800 transition duration-200 ease-in-out" required>
                                <option value="">Seleccione...</option>
                                @foreach ($titulaciones as $tit)
                                    <option value="{{ $tit->idtit }}" {{ request('idtit') == $tit->idtit ? 'selected' : '' }}>
                                        {{ $tit->detalletit }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idtit')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="idniv" class="block text-gray-700 text-sm font-bold mb-2">Nivel:</label>
                            <select id="idniv" name="idniv" onchange="this.form.submit()"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-800 transition duration-200 ease-in-out" required>
                                <option value="">Seleccione...</option>
                                @foreach ($niveles as $niv)
                                    <option value="{{ $niv->idniv }}" {{ request('idniv') == $niv->idniv ? 'selected' : '' }}>
                                        {{ $niv->nombreniv }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idniv')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </form>

                {{-- Formulario completo si ya se eligieron titulación y nivel --}}
                @if (request()->filled('idtit') && request()->filled('idniv'))
                    <hr class="my-8 border-t-2 border-gray-200">

                    <h3 class="text-2xl font-extrabold text-gray-900 mb-6 text-center">
                        Completa los Datos de la Matrícula
                    </h3>

                    <form method="POST" action="{{ route('admin.matriculas.store') }}">
                        @csrf

                        <input type="hidden" name="idtit" value="{{ request('idtit') }}">
                        <input type="hidden" name="idniv" value="{{ request('idniv') }}">

                        <!-- Campo Estudiante -->
                        <div class="mb-6">
                            <label for="idest" class="block text-gray-700 text-sm font-bold mb-2">Estudiante:</label>
                            <select id="idest" name="idest"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-800 transition duration-200 ease-in-out" required>
                                <option value="">Seleccione un estudiante</option>
                                @foreach ($estudiantes as $est)
                                    <option value="{{ $est->idest }}">{{ $est->nombresest }} {{ $est->apellidosest }}</option>
                                @endforeach
                            </select>
                            @error('idest')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Campo Periodo -->
                        <div class="mb-6">
                            <label for="idper" class="block text-gray-700 text-sm font-bold mb-2">Periodo Académico:</label>
                            <select id="idper" name="idper"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-800 transition duration-200 ease-in-out" required>
                                <option value="">Seleccione un periodo</option>
                                @foreach ($periodos as $per)
                                    <option value="{{ $per->idper }}">{{ $per->detalleper }}</option>
                                @endforeach
                            </select>
                            @error('idper')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Asignaturas disponibles -->
                        <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-3">Asignaturas disponibles:</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @forelse ($asignaturas as $asi)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="asi_{{ $asi->idasi }}" name="asignaturas[]" value="{{ $asi->idasi }}"
                                               class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                        <label for="asi_{{ $asi->idasi }}" class="ml-2 text-gray-700 text-base cursor-pointer">
                                            {{ $asi->nombreasi }}
                                        </label>
                                    </div>
                                @empty
                                    <p class="text-gray-600 italic col-span-full">
                                        No hay asignaturas disponibles para la titulación y nivel seleccionados.
                                    </p>
                                @endforelse
                            </div>
                            @error('asignaturas')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botón de Guardar -->
                        <div class="flex items-center justify-center">
                            <button type="submit"
                                    class="w-full md:w-auto bg-gradient-to-r from-purple-600 to-indigo-700 hover:from-purple-700 hover:to-indigo-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-opacity-50">
                                Guardar Matrícula
                            </button>
                        </div>
                    </form>
                @else
                    <div class="text-center text-gray-600 italic mt-8 p-4 bg-gray-50 rounded-lg">
                        <p class="mb-2">Por favor, selecciona una Titulación y un Nivel para ver las opciones de matrícula.</p>
                        <p class="text-sm">El formulario completo aparecerá una vez que hagas tu selección.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
