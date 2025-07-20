<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Registrar Nueva Asignatura') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-xl w-full mx-auto">
            <div class="bg-white shadow-2xl rounded-xl p-8 transform transition-all duration-300 hover:scale-[1.01]">
                <h3 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    Crear Nueva Asignatura
                </h3>
                <form method="POST" action="{{ route('admin.asignaturas.store') }}">
                    @csrf

                    <!-- Campo Nombre de la Asignatura -->
                    <div class="mb-6">
                        <label for="nombreasi" class="block text-gray-700 text-sm font-bold mb-2">
                            Nombre de la Asignatura
                        </label>
                        <input type="text" name="nombreasi" id="nombreasi" maxlength="50" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                               placeholder="Ej: Programación Orientada a Objetos">
                        @error('nombreasi')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Titulación -->
                    <div class="mb-6">
                        <label for="idtit" class="block text-gray-700 text-sm font-bold mb-2">
                            Titulación
                        </label>
                        <select name="idtit" id="idtit" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 text-gray-800 transition duration-200 ease-in-out">
                            <option value="">-- Seleccione una titulación --</option>
                            @foreach ($titulaciones as $tit)
                                <option value="{{ $tit->idtit }}">{{ $tit->detalletit }}</option>
                            @endforeach
                        </select>
                        @error('idtit')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Nivel -->
                    <div class="mb-6">
                        <label for="idniv" class="block text-gray-700 text-sm font-bold mb-2">
                            Nivel
                        </label>
                        <select name="idniv" id="idniv" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 text-gray-800 transition duration-200 ease-in-out">
                            <option value="">-- Seleccione un nivel --</option>
                            @foreach ($niveles as $niv)
                                <option value="{{ $niv->idniv }}">{{ $niv->nombreniv }}</option>
                            @endforeach
                        </select>
                        @error('idniv')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Horas Teóricas y Prácticas en una fila -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label for="teoricosasi" class="block text-gray-700 text-sm font-bold mb-2">
                                Horas Teóricas
                            </label>
                            <input type="number" name="teoricosasi" id="teoricosasi" min="0" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                                   placeholder="Ej: 60">
                            @error('teoricosasi')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="practicosasi" class="block text-gray-700 text-sm font-bold mb-2">
                                Horas Prácticas
                            </label>
                            <input type="number" name="practicosasi" id="practicosasi" min="0" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                                   placeholder="Ej: 30">
                            @error('practicosasi')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="flex items-center justify-center mt-8">
                        <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-emerald-600 to-green-700 hover:from-emerald-700 hover:to-green-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 focus:ring-opacity-50">
                            Guardar Asignatura
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
