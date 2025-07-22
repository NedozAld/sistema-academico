<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-white leading-tight">
            {{ __('Historial Académico') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 via-purple-50 to-pink-100 min-h-screen font-sans dark:from-gray-900 dark:via-purple-900 dark:to-indigo-900">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white/95 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-3xl p-8 lg:p-10 border border-white/20 dark:bg-gray-800/90 dark:border-gray-700/50">

                <div class="text-center mb-10">
                    <h3 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">
                        Tu <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 bg-clip-text text-transparent">Historial Académico</span>
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400">Un resumen de tus matrículas y asignaturas a lo largo del tiempo.</p>
                </div>

                @if($matriculas->isEmpty())
                    <div class="text-center py-16 px-4">
                        <svg class="mx-auto h-24 w-24 text-gray-400 dark:text-gray-600 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">No se encontró historial académico.</p>
                        <p class="text-lg text-gray-500 dark:text-gray-400">Parece que aún no tienes matrículas registradas.</p>
                    </div>
                @else
                    <div class="space-y-8">
                        @foreach($matriculas as $matricula)
                            <div class="bg-gradient-to-r from-white to-blue-50/50 dark:from-gray-700 dark:to-purple-800/30 p-6 rounded-2xl shadow-lg border border-blue-200/50 dark:border-purple-600/30 transform transition duration-300 ease-in-out hover:scale-[1.02] hover:shadow-xl hover:from-blue-50/70 hover:to-purple-50/70 dark:hover:from-purple-800/40 dark:hover:to-indigo-800/40">
                                <div class="flex items-center mb-4">
                                    <svg class="w-8 h-8 text-purple-600 dark:text-pink-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white leading-tight">
                                        {{ $matricula->periodo->detalleper ?? 'Período Desconocido' }} -
                                        {{ $matricula->nivel->nombreniv ?? 'Nivel Desconocido' }}
                                        <span class="text-lg font-medium text-purple-600 dark:text-pink-400 ml-2">({{ $matricula->titulacion->detalletit ?? 'Titulación Desconocida' }})</span>
                                    </h3>
                                </div>
                                <p class="text-sm font-medium text-blue-700 dark:text-blue-300 mb-3">Asignaturas inscritas:</p>
                                @if($matricula->detalles->isNotEmpty())
                                    <ul class="list-disc list-inside space-y-2 text-gray-800 dark:text-gray-200 pl-4">
                                        @foreach($matricula->detalles as $detalle)
                                            <li class="flex items-center">
                                                <svg class="w-4 h-4 text-green-500 dark:text-emerald-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                {{ $detalle->asignatura->nombreasi ?? 'Asignatura Desconocida' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-purple-500 dark:text-pink-400 italic pl-4">No hay asignaturas registradas para este período.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>