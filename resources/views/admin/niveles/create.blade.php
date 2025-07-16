<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Nivel') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <form method="POST" action="{{ route('admin.niveles.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nombreniv" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Nivel</label>
                        <input type="text" name="nombreniv" id="nombreniv" maxlength="30" required
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
