<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Matrícula Estudiantil') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">

            {{-- Primera Matrícula --}}
            @if ($modo === 'primera')
                <h3 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">
                    <span class="text-blue-600">Primera Matrícula</span> - Elige tu Carrera
                </h3>

                @if ($titulaciones->isEmpty())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg">
                        <p class="font-bold">¡Atención!</p>
                        <p>No hay titulaciones registradas para la matrícula. Contacta al administrador.</p>
                    </div>
                @else
                    <form method="POST" action="{{ route('estudiante.matricula.registrar') }}" class="space-y-6">
                        @csrf
                        <input type="hidden" name="idest" value="{{ $estudiante->idest }}">
                        <input type="hidden" name="idniv" value="{{ $nivelAsignado->idniv }}">
                        <input type="hidden" name="idper" value="{{ $periodoDisponible->idper }}">

                        {{-- Selección de Titulación --}}
                        <label for="idtit" class="block font-semibold text-gray-700 mb-2">Selecciona
                            Titulación:</label>
                        <select id="idtit" name="idtit" required
                            class="w-full border border-gray-300 rounded-lg p-2">
                            <option value="">-- Selecciona una opción --</option>
                            @foreach ($titulaciones as $tit)
                                <option value="{{ $tit->idtit }}">{{ $tit->nombretit }}</option>
                            @endforeach
                        </select>
                        {{-- Asignaturas dinámicas --}}
                        <div id="asignaturas-container"
                            class="hidden bg-blue-50 p-6 rounded-lg border border-blue-200 mt-4">
                            <label class="block font-semibold text-gray-700 mb-2">Asignaturas a Matricular:</label>
                            <div id="lista-asignaturas" class="grid grid-cols-1 md:grid-cols-2 gap-3"></div>
                            <p class="text-sm text-gray-500 mt-2">Las asignaturas se seleccionan automáticamente al
                                elegir la carrera.</p>
                        </div>

                        {{-- Botón --}}
                        <div>
                            <button type="submit"
                                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-bold">
                                Confirmar Matrícula
                            </button>
                        </div>
                    </form>
                @endif

                {{-- Avance de Nivel --}}
            @elseif ($modo === 'avance')
                <h3 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">
                    <span class="text-blue-600">Matrícula de Avance</span> - Siguiente Nivel
                </h3>

                <form method="POST" action="{{ route('estudiante.matricula.registrar') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="idest" value="{{ $estudiante->idest }}">
                    <input type="hidden" name="idniv" value="{{ $nivelAsignado->idniv }}">
                    <input type="hidden" name="idper" value="{{ $periodoActual->idper }}">
                    <input type="hidden" name="idtit" value="{{ $ultimaMatricula->idtit }}">

                    <div class="bg-blue-50 border border-blue-200 text-blue-800 px-6 py-4 rounded-lg shadow-md">
                        <p>Te matricularás en <strong>{{ $nivelAsignado->nomniv }}</strong> de
                            <strong>{{ $ultimaMatricula->titulacion->nombretit }}</strong> en el período
                            <strong>{{ $periodoActual->nombreper }}</strong>.</p>
                    </div>

                    {{-- Mostrar asignaturas del siguiente nivel --}}
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-inner">
                        <label class="block text-lg font-semibold text-gray-700 mb-3">Asignaturas:</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-2">
                            @php
                                $asignaturas = \App\Models\Asignatura::where('idtit', $ultimaMatricula->idtit)
                                    ->where('idniv', $nivelAsignado->idniv)
                                    ->get();
                            @endphp
                            @forelse ($asignaturas as $asig)
                                <label
                                    class="flex items-center p-2 bg-white rounded-md shadow-sm border border-gray-200">
                                    <input type="checkbox" name="asignaturas[]" value="{{ $asig->idasi }}"
                                        class="form-checkbox h-5 w-5 text-blue-600 mr-3" checked>
                                    <span>{{ $asig->nombreasi }}</span>
                                </label>
                            @empty
                                <p class="text-gray-600 col-span-full">No se encontraron asignaturas para este nivel y
                                    carrera.</p>
                            @endforelse
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-bold">
                        Confirmar Matrícula
                    </button>
                </form>

                {{-- Ya está matriculado --}}
            @elseif ($modo === 'bloqueado')
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-6 py-5 rounded-lg">
                    <p class="font-bold">Matrícula en Curso</p>
                    <p>Ya estás matriculado en el período actual. Espera al próximo período para continuar.</p>
                </div>

                {{-- Carrera completa --}}
            @elseif ($modo === 'completo')
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-5 rounded-lg">
                    <p class="font-bold">¡Felicidades!</p>
                    <p>Has completado todos los niveles de tu carrera. Éxitos en tu futuro profesional.</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Script para cargar asignaturas dinámicamente --}}
    @if ($modo === 'primera')
        <script>
            const titSelect = document.getElementById('idtit');
            const asignaturasContainer = document.getElementById('asignaturas-container');
            const listaAsignaturas = document.getElementById('lista-asignaturas');
            const nivel = "{{ $nivelAsignado->idniv }}";

            titSelect.addEventListener('change', function() {
                const idtit = this.value;
                if (!idtit) {
                    asignaturasContainer.classList.add('hidden');
                    listaAsignaturas.innerHTML = '';
                    return;
                }

                listaAsignaturas.innerHTML = '<p class="text-gray-500 col-span-full">Cargando asignaturas...</p>';
                asignaturasContainer.classList.remove('hidden');

                fetch(`/api/asignaturas/${idtit}/${nivel}`)
                    .then(res => res.json())
                    .then(data => {
                        listaAsignaturas.innerHTML = '';
                        if (data.length === 0) {
                            listaAsignaturas.innerHTML =
                                '<p class="text-gray-600 col-span-full">No se encontraron asignaturas.</p>';
                        } else {
                            data.forEach(asig => {
                                const label = document.createElement('label');
                                label.className =
                                    'flex items-center p-2 bg-white rounded-md shadow-sm border border-gray-200';

                                const checkbox = document.createElement('input');
                                checkbox.type = 'checkbox';
                                checkbox.name = 'asignaturas[]';
                                checkbox.value = asig.idasi;
                                checkbox.checked = true;
                                checkbox.className = 'form-checkbox h-5 w-5 text-blue-600 mr-3';

                                const span = document.createElement('span');
                                span.textContent = asig.nombreasi;

                                label.appendChild(checkbox);
                                label.appendChild(span);
                                listaAsignaturas.appendChild(label);
                            });
                        }
                    })
                    .catch(err => {
                        console.error('Error al cargar asignaturas:', err);
                        listaAsignaturas.innerHTML =
                            '<p class="text-red-500 col-span-full">Error al cargar asignaturas. Intenta más tarde.</p>';
                    });
            });
        </script>
    @endif
</x-app-layout>
