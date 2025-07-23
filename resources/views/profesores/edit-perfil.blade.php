<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-4xl text-gray-900 leading-tight tracking-tight text-center sm:text-left">
            {{ __('Editar Perfil del Profesor') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-sans">
        <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-2xl p-8 lg:p-10 border border-gray-200 transform transition-transform duration-300 hover:scale-[1.01]">
            <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Actualizar Información del Profesor</h3>
            <form action="{{ route('profesor.profesor.perfil.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="col-span-1">
                        <label for="nombrespro" class="block text-lg font-semibold text-gray-700 mb-2">Nombres</label>
                        <input type="text" name="nombrespro" id="nombrespro" value="{{ $profesor->nombrespro }}" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 placeholder-gray-400"
                               placeholder="Ingresa los nombres" />
                    </div>

                    <div class="col-span-1">
                        <label for="apellidospro" class="block text-lg font-semibold text-gray-700 mb-2">Apellidos</label>
                        <input type="text" name="apellidospro" id="apellidospro" value="{{ $profesor->apellidospro }}" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 placeholder-gray-400"
                               placeholder="Ingresa los apellidos" />
                    </div>

                    <div class="col-span-1">
                        <label for="telefonopro" class="block text-lg font-semibold text-gray-700 mb-2">Teléfono</label>
                        <input type="text" name="telefonopro" id="telefonopro" value="{{ $profesor->telefonopro }}" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 placeholder-gray-400"
                               placeholder="Ingresa el teléfono" />
                    </div>

                    <div class="col-span-1">
                        <label for="idare" class="block text-lg font-semibold text-gray-700 mb-2">Área</label>
                        <select name="idare" id="idare"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 bg-white">
                            @foreach ($areas as $area)
                                <option value="{{ $area->idare }}" {{ $profesor->idare == $area->idare ? 'selected' : '' }}>
                                    {{ $area->nombreare }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2 flex justify-end mt-6">
                        <button type="submit"
                                class="inline-flex items-center px-8 py-3 border border-transparent text-base font-semibold rounded-full shadow-lg text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
                            Actualizar Perfil
                            <svg class="ml-2 -mr-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
