<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Registrar Tutoría') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-sans">
        <div class="max-w-xl mx-auto">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl p-8 lg:p-10 border border-gray-200">
                <div class="text-center mb-8">
                    <h3 class="text-4xl font-extrabold text-gray-900 mb-2">
                        Programar Nueva <span class="text-blue-600">Tutoría</span>
                    </h3>
                    <p class="text-lg text-gray-600">Completa los detalles para agendar una sesión de tutoría.</p>
                </div>

                {{-- Mensajes de error --}}
                @if ($errors->any())
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center mb-2">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586z"/></svg>
                            </div>
                            <div>
                                <p class="font-bold">¡Atención!</p>
                            </div>
                        </div>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Debug info - puedes remover esto después --}}
                @if(config('app.debug'))
                    <div class="mb-6 p-4 bg-gray-100 rounded-lg shadow-inner border border-gray-200 text-gray-700 text-sm">
                        <strong class="font-semibold text-gray-800">Información de Depuración:</strong><br>
                        Total detalles: <span class="font-mono">{{ $detalles->count() }}</span><br>
                        @foreach($detalles->take(2) as $detalle)
                            Detalle <span class="font-mono">{{ $detalle->iddet }}</span>:
                            Estudiante: {{ $detalle->matricula?->estudiante?->nombresest ?? 'NULL' }}
                            {{ $detalle->matricula?->estudiante?->apellidosest ?? 'NULL' }}
                            - Asignatura: {{ $detalle->asignatura?->nombreasi ?? 'NULL' }}<br>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('admin.tutorias.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Campo para Estudiante - Asignatura --}}
                    <div class="mb-4">
                        <label for="iddet" class="block text-lg font-semibold text-gray-700 mb-2">Estudiante - Asignatura</label>
                        <select name="iddet" id="iddet"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-gray-800 text-lg"
                                required>
                            <option value="">Seleccionar estudiante y asignatura...</option>
                            @forelse ($detalles as $detalle)
                                <option value="{{ $detalle->iddet }}" {{ old('iddet') == $detalle->iddet ? 'selected' : '' }}>
                                    @if($detalle->matricula && $detalle->matricula->estudiante)
                                        {{ $detalle->matricula->estudiante->nombresest }}
                                        {{ $detalle->matricula->estudiante->apellidosest }}
                                    @else
                                        [Sin estudiante]
                                    @endif
                                    -
                                    @if($detalle->asignatura)
                                        {{ $detalle->asignatura->nombreasi }}
                                    @else
                                        [Sin asignatura]
                                    @endif
                                </option>
                            @empty
                                <option value="">No hay detalles de matrícula disponibles</option>
                            @endforelse
                        </select>
                        @error('iddet')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Campo para Horario --}}
                    <div class="mb-4">
                        <label for="idhor" class="block text-lg font-semibold text-gray-700 mb-2">Horario</label>
                        <select name="idhor" id="idhor"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-gray-800 text-lg"
                                required>
                            <option value="">Seleccionar horario...</option>
                            @foreach ($horarios as $horario)
                                <option value="{{ $horario->idhor }}" {{ old('idhor') == $horario->idhor ? 'selected' : '' }}>
                                    {{ $horario->dia?->nombredia ?? 'Sin día' }} -
                                    {{ $horario->iniciohor }} a {{ $horario->finhor }}
                                </option>
                            @endforeach
                        </select>
                        @error('idhor')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Campo para Detalle Tutoría --}}
                    <div class="mb-4">
                        <label for="detalletut" class="block text-lg font-semibold text-gray-700 mb-2">Detalle de la Tutoría</label>
                        <textarea name="detalletut" id="detalletut"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out text-gray-800 text-lg"
                                  rows="4" required placeholder="Describe brevemente el tema o contenido de la tutoría...">{{ old('detalletut') }}</textarea>
                        @error('detalletut')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.tutorias.index') }}"
                           class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-full shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                            <svg class="-ml-1 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Guardar Tutoría
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
