<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bienvenido al panel del estudiante") }}

                    <div class="mt-4 space-x-2">
                        <a href="{{ route('estudiante.perfil') }}"
                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Ir a mi perfil
                        </a>

                        <a href="{{ route('estudiante.matricula.form') }}"
                           class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                            Realizar Matrícula
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
