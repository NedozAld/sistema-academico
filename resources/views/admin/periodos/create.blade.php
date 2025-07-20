<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Registrar Nuevo Periodo Académico') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
        <div class="max-w-xl w-full mx-auto">
            <div class="bg-white shadow-2xl rounded-xl p-8 transform transition-all duration-300 hover:scale-[1.01]">
                <h3 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    Crear Nuevo Período
                </h3>
                <form method="POST" action="{{ route('admin.periodos.store') }}">
                    @csrf
                    
                    <!-- Campo Detalle del Período -->
                    <div class="mb-6">
                        <label for="detalleper" class="block text-gray-700 text-sm font-bold mb-2">
                            Detalle del Período
                        </label>
                        <input type="text" name="detalleper" id="detalleper" maxlength="30" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 placeholder-gray-400 transition duration-200 ease-in-out"
                               placeholder="Ej: Semestre 2025-I">
                    </div>

                    <!-- Campos de Fecha de Inicio y Fin -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label for="inicioper" class="block text-gray-700 text-sm font-bold mb-2">
                                Fecha de Inicio
                            </label>
                            <input type="date" name="inicioper" id="inicioper" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 transition duration-200 ease-in-out">
                        </div>
                        <div>
                            <label for="finper" class="block text-gray-700 text-sm font-bold mb-2">
                                Fecha de Fin
                            </label>
                            <input type="date" name="finper" id="finper" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800 transition duration-200 ease-in-out">
                        </div>
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="flex items-center justify-center">
                        <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Guardar Período
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
