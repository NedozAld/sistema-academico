<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Crear Día') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-teal-50 to-teal-100 min-h-screen font-sans">
        <div class="max-w-xl mx-auto">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl p-8 lg:p-10 border border-gray-200">
                <div class="text-center mb-8">
                    <h3 class="text-4xl font-extrabold text-gray-900 mb-2">
                        Registrar Nuevo <span class="text-teal-600">Día</span>
                    </h3>
                    <p class="text-lg text-gray-600">Completa el formulario para añadir un nuevo día al sistema.</p>
                </div>

                <form action="{{ route('admin.dias.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="mb-4">
                        <label for="nombredia" class="block text-lg font-semibold text-gray-700 mb-2">Nombre del Día</label>
                        <input type="text" name="nombredia" id="nombredia"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500 transition duration-150 ease-in-out text-gray-800 text-lg"
                               placeholder="Ej: Lunes, Martes, Miércoles..."
                               required>
                        @error('nombredia')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.dias.index') }}"
                           class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-full shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition duration-300 ease-in-out transform hover:scale-105">
                            <svg class="-ml-1 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Guardar Día
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
