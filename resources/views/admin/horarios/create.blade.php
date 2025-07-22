<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Crear Horario</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto">
            <form action="{{ route('admin.horarios.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="iddia" class="block">Día</label>
                    <select name="iddia" required>
                        @foreach ($dias as $dia)
                            <option value="{{ $dia->iddia }}">{{ $dia->nombredia }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-4">
                    <label for="iniciohor" class="block">Hora de Inicio</label>
                    <input type="time" name="iniciohor" id="iniciohor" required
                        class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="finhor" class="block">Hora de Fin</label>
                    <input type="time" name="finhor" id="finhor" required
                        class="w-full border rounded px-3 py-2">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
