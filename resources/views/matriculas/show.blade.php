<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de Matrícula
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <h3 class="text-lg font-bold mb-4">Datos Generales</h3>
                <p><strong>ID Matrícula:</strong> {{ $matricula->idmat }}</p>
                <p><strong>Estudiante:</strong> {{ $matricula->estudiante->nombresest }} {{ $matricula->estudiante->apellidosest }}</p>
                <p><strong>Periodo:</strong> {{ $matricula->periodo->detalleper }}</p>
                <p><strong>Fecha de Matrícula:</strong> {{ $matricula->fechamat }}</p>

                <h3 class="text-lg font-bold mt-6 mb-2">Asignaturas Matriculadas</h3>
                <ul class="list-disc pl-6">
                    @foreach($matricula->detalles as $detalle)
                        <li>
                            {{ $detalle->asignatura->nombreasi ?? 'Asignatura no encontrada' }}
                            <span class="text-sm text-gray-500">({{ $detalle->detalledet }})</span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4">
                    <a href="{{ route('matriculas.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
