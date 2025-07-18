<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Profesor') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.profesores.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="idpro" class="block font-bold mb-1">Cédula:</label>
                        <input type="text" name="idpro" id="idpro"
                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                        @error('idpro')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nombrespro" class="block font-bold mb-1">Nombres:</label>
                        <input type="text" name="nombrespro" id="nombrespro"
                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                        @error('nombrespro')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="apellidospro" class="block font-bold mb-1">Apellidos:</label>
                        <input type="text" name="apellidospro" id="apellidospro"
                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                        @error('apellidospro')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="telefonopro" class="block font-bold mb-1">Teléfono:</label>
                        <input type="text" name="telefonopro" id="telefonopro"
                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                        @error('telefonopro')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="idare" class="block font-bold mb-1">Área:</label>
                        <select name="idare" id="idare" class="w-full border border-gray-300 rounded px-3 py-2"
                            required>
                            <option value="">Seleccione un área</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->idare }}">{{ $area->nombreare }}</option>
                            @endforeach
                        </select>
                        @error('idare')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded">
                        Guardar Profesor
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
