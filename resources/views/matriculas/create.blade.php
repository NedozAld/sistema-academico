<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Matrícula') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Selección de Titulación y Nivel --}}
                <form method="GET" action="{{ route('admin.matriculas.create') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="idtit" class="block font-bold mb-1">Titulación:</label>
                            <select id="idtit" name="idtit" onchange="this.form.submit()" class="w-full border rounded px-3 py-2" required>
                                <option value="">Seleccione...</option>
                                @foreach ($titulaciones as $tit)
                                    <option value="{{ $tit->idtit }}" {{ request('idtit') == $tit->idtit ? 'selected' : '' }}>
                                        {{ $tit->detalletit }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idtit')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="idniv" class="block font-bold mb-1">Nivel:</label>
                            <select id="idniv" name="idniv" onchange="this.form.submit()" class="w-full border rounded px-3 py-2" required>
                                <option value="">Seleccione...</option>
                                @foreach ($niveles as $niv)
                                    <option value="{{ $niv->idniv }}" {{ request('idniv') == $niv->idniv ? 'selected' : '' }}>
                                        {{ $niv->nombreniv }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idniv')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </form>

                {{-- Formulario completo si ya se eligieron titulación y nivel --}}
                @if (request()->filled('idtit') && request()->filled('idniv'))
                    <form method="POST" action="{{ route('admin.matriculas.store') }}">
                        @csrf

                        <input type="hidden" name="idtit" value="{{ request('idtit') }}">
                        <input type="hidden" name="idniv" value="{{ request('idniv') }}">

                        <div class="mt-4">
                            <label for="idest" class="block font-bold mb-1">Estudiante:</label>
                            <select id="idest" name="idest" class="w-full border rounded px-3 py-2" required>
                                <option value="">Seleccione un estudiante</option>
                                @foreach ($estudiantes as $est)
                                    <option value="{{ $est->idest }}">{{ $est->nombresest }} {{ $est->apellidosest }}</option>
                                @endforeach
                            </select>
                            @error('idest')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="idper" class="block font-bold mb-1">Periodo:</label>
                            <select id="idper" name="idper" class="w-full border rounded px-3 py-2" required>
                                <option value="">Seleccione un periodo</option>
                                @foreach ($periodos as $per)
                                    <option value="{{ $per->idper }}">{{ $per->detalleper }}</option>
                                @endforeach
                            </select>
                            @error('idper')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label class="block font-bold mb-2">Asignaturas disponibles:</label>
                            @forelse ($asignaturas as $asi)
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" id="asi_{{ $asi->idasi }}" name="asignaturas[]" value="{{ $asi->idasi }}">
                                    <label for="asi_{{ $asi->idasi }}">{{ $asi->nombreasi }}</label>
                                </div>
                            @empty
                                <p class="text-gray-600">No hay asignaturas disponibles para esta carrera y nivel.</p>
                            @endforelse
                            @error('asignaturas')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                                Guardar Matrícula
                            </button>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
