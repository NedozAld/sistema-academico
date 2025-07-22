<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Registrar Tutoría</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto">
            @if ($errors->any())
                <div class="mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Debug info - puedes remover esto después -->
            @if(config('app.debug'))
                <div class="mb-4 p-4 bg-gray-100 rounded">
                    <strong>Debug Info:</strong><br>
                    Total detalles: {{ $detalles->count() }}<br>
                    @foreach($detalles->take(2) as $detalle)
                        Detalle {{ $detalle->iddet }}:
                        Estudiante: {{ $detalle->matricula?->estudiante?->nombresest ?? 'NULL' }}
                        {{ $detalle->matricula?->estudiante?->apellidosest ?? 'NULL' }}
                        - Asignatura: {{ $detalle->asignatura?->nombreasi ?? 'NULL' }}<br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.tutorias.store') }}" method="POST">
                @csrf
                
                <!-- El idtut se genera automáticamente con el trigger -->
                
                <div class="mb-4">
                    <label for="iddet" class="block text-sm font-medium mb-2">Estudiante - Asignatura</label>
                    <select name="iddet" class="w-full border px-3 py-2 rounded" required>
                        <option value="">Seleccionar...</option>
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
                            <option value="">No hay detalles disponibles</option>
                        @endforelse
                    </select>
                </div>

                <div class="mb-4">
                    <label for="idhor" class="block text-sm font-medium mb-2">Horario</label>
                    <select name="idhor" class="w-full border px-3 py-2 rounded" required>
                        <option value="">Seleccionar horario...</option>
                        @foreach ($horarios as $horario)
                            <option value="{{ $horario->idhor }}" {{ old('idhor') == $horario->idhor ? 'selected' : '' }}>
                                {{ $horario->dia?->nombredia ?? 'Sin día' }} - 
                                {{ $horario->iniciohor }} a {{ $horario->finhor }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="detalletut" class="block text-sm font-medium mb-2">Detalle Tutoría</label>
                    <textarea name="detalletut" class="w-full border px-3 py-2 rounded" 
                              rows="3" required placeholder="Describe el contenido de la tutoría...">{{ old('detalletut') }}</textarea>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Guardar Tutoría
                    </button>
                    <a href="{{ route('admin.tutorias.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>