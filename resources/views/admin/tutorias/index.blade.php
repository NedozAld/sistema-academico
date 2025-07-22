<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Lista de Tutorías') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-end mb-6">
                <a href="{{ route('admin.tutorias.create') }}"
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                    <svg class="-ml-1 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Registrar Tutoría
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl p-8 lg:p-10 border border-gray-200">
                {{-- Mensaje de éxito --}}
                @if (session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                            </div>
                            <div>
                                <p class="font-bold">¡Éxito!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Contenido principal: Tabla de tutorías o mensaje de vacío --}}
                @if ($tutorias->count())
                    <div class="overflow-x-auto rounded-xl shadow-lg border border-gray-100">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider rounded-tl-xl">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Estudiante</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Asignatura</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Horario</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Detalle</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider rounded-tr-xl">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($tutorias as $tutoria)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $tutoria->idtut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $tutoria->detalle?->matricula?->estudiante?->nombresest ?? 'N/A' }}
                                            {{ $tutoria->detalle?->matricula?->estudiante?->apellidosest ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tutoria->detalle?->asignatura?->nombreasi ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $tutoria->horario?->dia?->nombredia ?? 'N/A' }},
                                            {{ $tutoria->horario?->iniciohor ?? 'N/A' }} - {{ $tutoria->horario?->finhor ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tutoria->detalletut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href=""
                                               class="text-indigo-600 hover:text-indigo-900 mr-4 transition duration-150 ease-in-out">
                                                Editar
                                            </a>
                                            <form action="" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900 transition duration-150 ease-in-out"
                                                        onclick="return confirm('¿Estás seguro de que quieres eliminar esta tutoría?');">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-16 px-4">
                        <svg class="mx-auto h-24 w-24 text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <p class="text-2xl font-semibold text-gray-700 mb-4">No hay tutorías registradas aún.</p>
                        <p class="text-lg text-gray-500">Puedes registrar nuevas tutorías usando el botón "Registrar Tutoría".</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
