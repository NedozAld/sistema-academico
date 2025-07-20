<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Materias Matriculadas') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-xl border border-gray-200">

            @if (!$matricula)
                {{-- Mensaje cuando no hay matrícula --}}
                <div
                    class="bg-gray-100 border border-gray-300 text-gray-700 px-6 py-5 rounded-lg flex items-center space-x-4 shadow-md">
                    <svg class="w-10 h-10 flex-shrink-0 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                    <div>
                        <p class="font-bold text-xl">¡Atención!</p>
                        <p class="text-lg">No estás matriculado en ningún período académico actualmente.</p>
                        <p class="text-sm text-gray-600 mt-1">Por favor, realiza tu matrícula para ver tus asignaturas.
                        </p>
                    </div>
                </div>
            @else
                {{-- Información de la Matrícula --}}
                <div class="mb-8 pb-6 border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-5 text-center">Detalles de tu Matrícula Actual</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div
                            class="bg-gray-50 p-5 rounded-lg shadow-sm border border-gray-200 flex items-center space-x-4">
                            <svg class="w-8 h-8 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Período</p>
                                <p> {{ $matricula->periodo->detalleper }}</p>

                            </div>
                        </div>
                        <div
                            class="bg-gray-50 p-5 rounded-lg shadow-sm border border-gray-200 flex items-center space-x-4">
                            <svg class="w-8 h-8 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Carrera</p>
                                <p> {{ $matricula->titulacion->detalletit }}</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 p-5 rounded-lg shadow-sm border border-gray-200 flex items-center space-x-4">
                            <svg class="w-8 h-8 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nivel</p>
                                <p>{{ $matricula->nivel->nombreniv }}</p>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 p-5 rounded-lg shadow-sm border border-gray-200 flex items-center space-x-4 col-span-1 md:col-span-2 lg:col-span-3">
                            <svg class="w-8 h-8 text-gray-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Fecha de Matrícula</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($matricula->fechamat)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lista de Asignaturas Matriculadas --}}
                <h3 class="text-2xl font-bold text-gray-800 mb-5 text-center">Asignaturas Matriculadas</h3>

                @if ($asignaturas->isEmpty())
                    <div
                        class="bg-gray-50 border border-gray-300 text-gray-700 px-6 py-4 rounded-lg flex items-center space-x-4 shadow-sm">
                        <svg class="w-8 h-8 flex-shrink-0 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <div>
                            <p class="font-semibold text-lg">No se encontraron asignaturas.</p>
                            <p class="text-sm text-gray-600">Parece que no tienes asignaturas registradas
                                para esta matrícula.</p>
                        </div>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($asignaturas as $asig)
                            <div
                                class="flex items-center p-4 bg-gray-50 rounded-lg shadow-sm border border-gray-200 transition duration-150 ease-in-out hover:bg-gray-100">
                                <svg class="w-6 h-6 text-gray-600 mr-3 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                <p class="text-lg font-medium text-gray-800">{{ $asig->nombreasi }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
