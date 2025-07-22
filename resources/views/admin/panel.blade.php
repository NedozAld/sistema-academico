<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">¡Bienvenido al Panel de
                        Administración!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                        {{-- Tarjeta para Gestión de Departamentos --}}
                        <div
                            class="bg-blue-50 border-l-4 border-blue-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-blue-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m8-10h1m-1 4h1m-1 4h1m-9-4h.01M7 16h.01">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Departamentos</h4>
                            <p class="text-gray-600 mb-6">Crea, edita y visualiza los departamentos de tu organización.
                            </p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.departamentos.create') }}"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Crear Departamento
                                </a>
                                <a href="{{ route('admin.departamentos.index') }}"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Departamentos
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Áreas --}}
                        <div
                            class="bg-green-50 border-l-4 border-green-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-green-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Áreas</h4>
                            <p class="text-gray-600 mb-6">Registra y administra las áreas de trabajo dentro de los
                                departamentos.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.areas.create') }}"
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Registrar Área
                                </a>
                                <a href="{{ route('admin.areas.index') }}"
                                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Áreas Registradas
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión Académica (Matrículas) --}}
                        <div
                            class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-yellow-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Matrículas</h4>
                            <p class="text-gray-600 mb-6">Inscribe estudiantes en periodos académicos y asignaturas.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.matriculas.create') }}"
                                    class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nueva Matrícula
                                </a>
                                <a href="{{ route('admin.matriculas.index') }}"
                                    class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Matrículas
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Titulaciones --}}
                        <div
                            class="bg-red-50 border-l-4 border-red-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-red-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zM12 14v9m-9-9h18"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Titulaciones</h4>
                            <p class="text-gray-600 mb-6">Administra las titulaciones y carreras disponibles.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.titulaciones.create') }}"
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nueva Titulación
                                </a>
                                <a href="{{ route('admin.titulaciones.index') }}"
                                    class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Titulaciones
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Niveles --}}
                        <div
                            class="bg-indigo-50 border-l-4 border-indigo-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-indigo-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h4l3 8 4-16 3 8h4"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Niveles</h4>
                            <p class="text-gray-600 mb-6">Define y organiza los niveles académicos de tu institución.
                            </p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.niveles.create') }}"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nuevo Nivel
                                </a>
                                <a href="{{ route('admin.niveles.index') }}"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Niveles
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Periodos --}}
                        <div
                            class="bg-purple-50 border-l-4 border-purple-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-purple-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v9a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Periodos</h4>
                            <p class="text-gray-600 mb-6">Administra los periodos académicos y sus fechas.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.periodos.create') }}"
                                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nuevo Periodo
                                </a>
                                <a href="{{ route('admin.periodos.index') }}"
                                    class="w-full bg-fuchsia-600 hover:bg-fuchsia-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Periodos
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Asignaturas --}}
                        <div
                            class="bg-orange-50 border-l-4 border-orange-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-orange-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Asignaturas</h4>
                            <p class="text-gray-600 mb-6">Crea y administra las asignaturas que se imparten.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.asignaturas.create') }}"
                                    class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nueva Asignatura
                                </a>
                                <a href="{{ route('admin.asignaturas.index') }}"
                                    class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Asignaturas
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Estudiantes --}}
                        <div
                            class="bg-teal-50 border-l-4 border-teal-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-teal-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h2a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v11a2 2 0 002 2h2m10-4h2m1-4h1m-9-2h.01M6 16h.01M6 12h.01M6 8h.01M13 16h.01M13 12h.01M13 8h.01">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Estudiantes</h4>
                            <p class="text-gray-600 mb-6">Administra la información de todos los estudiantes.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href=""
                                    class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nuevo Estudiante
                                </a>
                                <a href=""
                                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Estudiantes
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Profesores --}}
                        <div
                            class="bg-cyan-50 border-l-4 border-cyan-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-cyan-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14c-1.49 0-2.98.05-4.46.15-2.01.14-3.54 1.67-3.68 3.68C3.79 19.33 5.48 21 7.5 21h9c2.02 0 3.71-1.67 3.64-3.17-.14-2.01-1.67-3.54-3.68-3.68C14.98 14.05 13.49 14 12 14z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Profesores</h4>
                            <p class="text-gray-600 mb-6">Administra la información de los profesores y su asignación.
                            </p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.profesores.create') }}"
                                    class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" ...></svg>
                                    Nuevo Profesor
                                </a>

                                <a href="{{ route('admin.profesores.index') }}"
                                    class="w-full bg-sky-600 hover:bg-sky-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Profesores
                                </a>
                            </div>
                        </div>
                        <div
                            class="bg-pink-50 border-l-4 border-pink-500 rounded-xl shadow-lg p-8 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="text-pink-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Asignaciones</h4>
                            <p class="text-gray-600 mb-6">Asigna materias a los docentes para cada período académico.
                            </p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.asignaciones.create') }}"
                                    class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nueva Asignación
                                </a>
                                <a href="{{ route('admin.asignaciones.index') }}"
                                    class="w-full bg-fuchsia-600 hover:bg-fuchsia-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                    Ver Asignaciones
                                </a>
                            </div>
                        </div>


                        <div>
                            <h7>Dias</h7>
                            <a href="{{route('admin.dias.create')}}"> crear Dias</a>
                            <a href="{{route('admin.dias.index')}}"> ver Dias</a>
                        </div>

                        <div>
                            <h7>Horarios</h7>
                            <a href="{{route('admin.horarios.create')}}"> crear Dias</a>
                            <a href="{{route('admin.horarios.index')}}"> ver Dias</a>
                        </div>

                        <div>
                            <h7>Tutorias</h7>
                            <a href="{{route('admin.tutorias.create')}}"> crear Tutorias</a>
                            <a href="{{route('admin.tutorias.index')}}"> ver Tutorias</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
