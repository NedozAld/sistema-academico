<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Registrar Nuevo Nivel') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-purple-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-xl w-full mx-auto">
            <div class="bg-white shadow-2xl rounded-xl p-8 transform transition-all duration-300 hover:scale-[1.01]">
                <h3 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    Crear Nuevo Nivel Académico
                </h3>
                <form method="POST" action="{{ route('admin.niveles.store') }}">
                    @csrf

                    <!-- Campo Nombre del Nivel -->
                    <div class="mb-6">
                        <label for="nombreniv" class="block text-gray-700 text-sm font-bold mb-2">
                            Nombre del Nivel
                        </label>
                        <input type="text" name="nombreniv" id="nombreniv" maxlength="30" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                               placeholder="Ej: Primer Nivel, Nivel Básico">
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="flex items-center justify-center mt-8">
                        <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-purple-600 to-indigo-700 hover:from-purple-700 hover:to-indigo-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-opacity-50">
                            Guardar Nivel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
