<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Registrar Profesor') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-xl w-full mx-auto">
            <div class="bg-white shadow-2xl rounded-xl p-8 transform transition-all duration-300 hover:scale-[1.01]">
                <h3 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    Registrar Nuevo Profesor
                </h3>

                <!-- Mensaje de éxito -->
                @if (session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">¡Éxito!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.profesores.store') }}">
                    @csrf

                    <!-- Cédula -->
                    <div class="mb-6">
                        <label for="idpro" class="block text-gray-700 text-sm font-bold mb-2">Cédula:</label>
                        <input type="text" name="idpro" id="idpro"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                               placeholder="Ej: 1234567890" required>
                        @error('idpro')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nombres y Apellidos en una fila -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="nombrespro" class="block text-gray-700 text-sm font-bold mb-2">Nombres:</label>
                            <input type="text" name="nombrespro" id="nombrespro"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                                   placeholder="Ej: Juan Andrés" required>
                            @error('nombrespro')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="apellidospro" class="block text-gray-700 text-sm font-bold mb-2">Apellidos:</label>
                            <input type="text" name="apellidospro" id="apellidospro"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                                   placeholder="Ej: Pérez García" required>
                            @error('apellidospro')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-6">
                        <label for="telefonopro" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                        <input type="text" name="telefonopro" id="telefonopro"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                               placeholder="Ej: 0987654321" required>
                        @error('telefonopro')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Área -->
                    <div class="mb-8">
                        <label for="idare" class="block text-gray-700 text-sm font-bold mb-2">Área:</label>
                        <select name="idare" id="idare"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 transition duration-200 ease-in-out"
                                required>
                            <option value="">Seleccione un área</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->idare }}">{{ $area->nombreare }}</option>
                            @endforeach
                        </select>
                        @error('idare')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="flex items-center justify-center">
                        <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Guardar Profesor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
