<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Matrícula') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.matriculas.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="idest" class="block font-bold mb-1">Estudiante:</label>
                        <select name="idest" class="w-full border border-gray-300 rounded px-3 py-2" required>
                            @foreach ($estudiantes as $est)
                                <option value="{{ $est->idest }}">{{ $est->nombresest }} {{ $est->apellidosest }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="idper" class="block font-bold mb-1">Periodo:</label>
                        <select name="idper" class="w-full border border-gray-300 rounded px-3 py-2" required>
                            @foreach ($periodos as $per)
                                <option value="{{ $per->idper }}">{{ $per->detalleper }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Asignaturas:</label>
                        @foreach ($asignaturas as $asi)
                            <div>
                                <input type="checkbox" name="asignaturas[]" value="{{ $asi->idasi }}">
                                {{ $asi->nombreasi }}
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                        Guardar Matrícula
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
