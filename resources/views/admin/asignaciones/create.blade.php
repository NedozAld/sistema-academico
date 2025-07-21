<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Asignar Profesor a Asignatura') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-purple-50 to-pink-100 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-xl w-full mx-auto">
            <div class="bg-white shadow-2xl rounded-xl p-8 transform transition-all duration-300 hover:scale-[1.01]">
                <h3 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    Asignar Docente a Materia
                </h3>

                <!-- Mensaje de éxito (ejemplo, si tu aplicación lo maneja) -->
                @if (session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">¡Asignación Exitosa!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.asignaciones.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Selección de Profesor -->
                    <div>
                        <label for="idpro" class="block text-gray-700 text-sm font-bold mb-2">Profesor:</label>
                        <select name="idpro" id="idpro" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-800 transition duration-200 ease-in-out">
                            <option value="">-- Seleccione un profesor --</option>
                            @foreach ($profesores as $pro)
                                <option value="{{ $pro->idpro }}">{{ $pro->nombrespro }} {{ $pro->apellidospro }}</option>
                            @endforeach
                        </select>
                        @error('idpro')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Selección de Asignatura -->
                    <div>
                        <label for="idasi" class="block text-gray-700 text-sm font-bold mb-2">Asignatura:</label>
                        <select name="idasi" id="idasi" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-pink-500 focus:border-pink-500 text-gray-800 transition duration-200 ease-in-out">
                            <option value="">-- Seleccione una asignatura --</option>
                            @foreach ($asignaturas as $asi)
                                <option value="{{ $asi->idasi }}">{{ $asi->nombreasi }}</option>
                            @endforeach
                        </select>
                        @error('idasi')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de Asignar -->
                    <div class="flex items-center justify-center pt-4">
                        <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-purple-600 to-pink-700 hover:from-purple-700 hover:to-pink-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-opacity-50">
                            Asignar Profesor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
