<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nueva Área') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-xl p-8 md:p-10">
                <h3 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">
                    Registrar Nueva Área
                </h3>

                <form action="{{ route('admin.areas.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="iddep" class="block text-gray-700 text-sm font-bold mb-2">
                            Seleccionar Departamento:
                        </label>
                        <select
                            name="iddep"
                            id="iddep"
                            class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            required
                        >
                            <option value="">-- Seleccione un Departamento --</option>
                            @foreach (\App\Models\Departamento::all() as $departamento)
                                <option value="{{ $departamento->iddep }}">{{ $departamento->nombredep }}</option>
                            @endforeach
                        </select>
                        {{-- Mensaje de error para el campo iddep --}}
                        @error('iddep')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="nombreare" class="block text-gray-700 text-sm font-bold mb-2">
                            Nombre del Área:
                        </label>
                        <input
                            type="text"
                            name="nombreare"
                            id="nombreare"
                            class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            placeholder="Ej: Soporte Técnico, Marketing Digital"
                            required
                        >
                        {{-- Mensaje de error para el campo nombreare --}}
                        @error('nombreare')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <button
                            type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:scale-105 shadow-lg"
                        >
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Registrar Área
                        </button>
                        <a href="{{ route('admin.areas.index') }}"
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
