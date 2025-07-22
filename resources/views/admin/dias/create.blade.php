<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">Crear Día</h2>
    </x-slot>

    <div class="py-6 px-6">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md border border-gray-200">
            <form action="{{ route('admin.dias.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nombredia" class="block font-medium">Nombre del Día</label>
                    <input type="text" name="nombredia" id="nombredia" class="w-full border rounded p-2" required>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            </form>
        </div>
    </div>
</x-app-layout>
