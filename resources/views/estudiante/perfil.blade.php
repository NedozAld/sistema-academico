<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Perfil del Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-200">
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                    <h3 class="text-3xl font-extrabold text-gray-800">Información Personal</h3>
                    {{-- Puedes añadir un botón de edición aquí si la funcionalidad existe --}}
                    {{-- <button class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition duration-200 ease-in-out transform hover:scale-105">
                        Editar Perfil
                    </button> --}}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                    {{-- Cédula --}}
                    <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                        <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0H9m7 0h-4"></path></svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Cédula</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $estudiante->idest }}</p>
                        </div>
                    </div>

                    {{-- Nombre Completo --}}
                    <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                        <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nombre Completo</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $estudiante->nombresest }} {{ $estudiante->apellidosest }}</p>
                        </div>
                    </div>

                    {{-- Dirección --}}
                    <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                        <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Dirección</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $estudiante->direccionest }}</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                        <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 4v7a2 2 0 002 2h14a2 2 0 002-2v-7"></path></svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Email</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $estudiante->mailest }}</p>
                        </div>
                    </div>

                    {{-- Fecha de Nacimiento --}}
                    <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm col-span-1 md:col-span-2">
                        <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Fecha de Nacimiento</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $estudiante->nacimientoest }}</p>
                        </div>
                    </div>
                </div>

                {{-- Sección adicional para información académica (ejemplo) --}}
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Información Académica Reciente</h3>
                    @if (isset($ultimaMatricula))
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                            <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                                <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Carrera Actual</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $ultimaMatricula->titulacion->nombretit ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm">
                                <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Nivel Actual</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $ultimaMatricula->nivel->nomniv ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg shadow-sm col-span-1 md:col-span-2">
                                <svg class="w-7 h-7 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Período de Última Matrícula</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $ultimaMatricula->periodo->nombreper ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-600 text-center py-4">No se encontró información de matrícula reciente para este estudiante.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
