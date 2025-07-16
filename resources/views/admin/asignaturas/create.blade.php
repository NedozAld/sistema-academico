<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nueva Asignatura') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <form method="POST" action="{{ route('admin.asignaturas.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="idasi" class="block text-gray-700 font-bold mb-2">ID Asignatura</label>
                        <input type="text" name="idasi" id="idasi" maxlength="10" required
                               class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="nombreasi" class="block text-gray-700 font-bold mb-2">Nombre</label>
                        <input type="text" name="nombreasi" id="nombreasi" maxlength="50" required
                               class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="idtit" class="block text-gray-700 font-bold mb-2">Titulación</label>
                        <select name="idtit" id="idtit" class="form-select w-full" required>
                            <option value="">-- Seleccione --</option>
                            @foreach ($titulaciones as $tit)
                                <option value="{{ $tit->idtit }}">{{ $tit->detalletit }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="idniv" class="block text-gray-700 font-bold mb-2">Nivel</label>
                        <select name="idniv" id="idniv" class="form-select w-full" required>
                            <option value="">-- Seleccione --</option>
                            @foreach ($niveles as $niv)
                                <option value="{{ $niv->idniv }}">{{ $niv->nombreniv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="teoricosasi" class="block text-gray-700 font-bold mb-2">Horas Teóricas</label>
                        <input type="number" name="teoricosasi" id="teoricosasi" min="0" required
                               class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="practicosasi" class="block text-gray-700 font-bold mb-2">Horas Prácticas</label>
                        <input type="number" name="practicosasi" id="practicosasi" min="0" required
                               class="form-input w-full">
                    </div>

                    <div class="flex justify-end">
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
