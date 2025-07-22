<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-purple-100 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl p-8 lg:p-12 border border-gray-200">
                <div class="text-center mb-10">
                    <h3 class="text-5xl font-extrabold text-gray-900 mb-4 leading-tight">
                        Bienvenido al <span class="text-purple-600">Panel de Administración</span>
                    </h3>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">Gestiona los aspectos clave del sistema educativo.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">

                    {{-- Tarjeta para Gestión de Departamentos --}}
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-blue-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:rotate-3 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m8-10h1m-1 4h1m-1 4h1m-9-4h.01M7 16h.01"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Departamentos</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Crea, edita y visualiza los departamentos de tu organización.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.departamentos.create') }}"
                                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Crear Departamento
                            </a>
                            <a href="{{ route('admin.departamentos.index') }}"
                                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Departamentos
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta para Gestión de Áreas --}}
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-green-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Áreas</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Registra y administra las áreas de trabajo dentro de los departamentos.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.areas.create') }}"
                                class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Registrar Área
                            </a>
                            <a href="{{ route('admin.areas.index') }}"
                                class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Áreas Registradas
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta: Gestión de Asignaciones --}}
                    <div class="bg-gradient-to-br from-pink-500 to-pink-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-pink-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:rotate-6 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Asignaciones</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Asigna materias a los docentes para cada período académico.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.asignaciones.create') }}"
                                class="w-full bg-pink-700 hover:bg-pink-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nueva Asignación
                            </a>
                            <a href="{{ route('admin.asignaciones.index') }}"
                                class="w-full bg-pink-700 hover:bg-pink-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Asignaciones
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta: Gestión de Días --}}
                    <div class="bg-gradient-to-br from-teal-500 to-teal-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-teal-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Días</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Administra los días disponibles para horarios y tutorías.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.dias.create') }}"
                                class="w-full bg-teal-700 hover:bg-teal-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Crear Día
                            </a>
                            <a href="{{ route('admin.dias.index') }}"
                                class="w-full bg-teal-700 hover:bg-teal-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Días
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta: Gestión de Horarios --}}
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-orange-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:animate-spin transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Horarios</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Define y organiza los bloques de tiempo para las tutorías.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.horarios.create') }}"
                                class="w-full bg-orange-700 hover:bg-orange-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Crear Horario
                            </a>
                            <a href="{{ route('admin.horarios.index') }}"
                                class="w-full bg-orange-700 hover:bg-orange-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Horarios
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta: Gestión de Tutorías --}}
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-blue-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:animate-bounce transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Tutorías</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Crea y supervisa las sesiones de tutoría.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.tutorias.create') }}"
                                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Crear Tutoría
                            </a>
                            <a href="{{ route('admin.tutorias.index') }}"
                                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Tutorías
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta para Gestión de Niveles --}}
                    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-indigo-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8 4-16 3 8h4"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Niveles</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Define y organiza los niveles académicos de tu institución.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.niveles.create') }}"
                                class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nuevo Nivel
                            </a>
                            <a href="{{ route('admin.niveles.index') }}"
                                class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Niveles
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta para Gestión de Periodos --}}
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-purple-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:animate-pulse transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v9a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Periodos</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Administra los periodos académicos y sus fechas.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.periodos.create') }}"
                                class="w-full bg-purple-700 hover:bg-purple-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nuevo Periodo
                            </a>
                            <a href="{{ route('admin.periodos.index') }}"
                                class="w-full bg-purple-700 hover:bg-purple-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Periodos
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta para Gestión de Asignaturas --}}
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-orange-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Asignaturas</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Crea y administra las asignaturas que se imparten.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.asignaturas.create') }}"
                                class="w-full bg-orange-700 hover:bg-orange-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nueva Asignatura
                            </a>
                            <a href="{{ route('admin.asignaturas.index') }}"
                                class="w-full bg-orange-700 hover:bg-orange-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Asignaturas
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta para Gestión de Estudiantes 
                    <div class="bg-gradient-to-br from-teal-500 to-teal-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-teal-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h2a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v11a2 2 0 002 2h2m10-4h2m1-4h1m-9-2h.01M6 16h.01M6 12h.01M6 8h.01M13 16h.01M13 12h.01M13 8h.01"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Estudiantes</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Administra la información de todos los estudiantes.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.estudiantes.create') }}"
                                class="w-full bg-teal-700 hover:bg-teal-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nuevo Estudiante
                            </a>
                            <a href="{{ route('admin.estudiantes.index') }}"
                                class="w-full bg-teal-700 hover:bg-teal-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Estudiantes
                            </a>
                        </div>
                    </div>--}}

                    {{-- Tarjeta para Gestión de Profesores --}}
                    <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-cyan-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14c-1.49 0-2.98.05-4.46.15-2.01.14-3.54 1.67-3.68 3.68C3.79 19.33 5.48 21 7.5 21h9c2.02 0 3.71-1.67 3.64-3.17-.14-2.01-1.67-3.54-3.68-3.68C14.98 14.05 13.49 14 12 14z"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Profesores</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Administra la información de los profesores y su asignación.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.profesores.create') }}"
                                class="w-full bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nuevo Profesor
                            </a>
                            <a href="{{ route('admin.profesores.index') }}"
                                class="w-full bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Profesores
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta para Gestión Académica (Matrículas) --}}
                    <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-yellow-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Matrículas</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Inscribe estudiantes en periodos académicos y asignaturas.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.matriculas.create') }}"
                                class="w-full bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nueva Matrícula
                            </a>
                            <a href="{{ route('admin.matriculas.index') }}"
                                class="w-full bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Matrículas
                            </a>
                        </div>
                    </div>

                    {{-- Tarjeta para Gestión de Titulaciones --}}
                    <div class="bg-gradient-to-br from-red-500 to-red-600 text-white rounded-3xl shadow-xl hover:shadow-2xl p-8 flex flex-col items-center justify-center text-center transform transition duration-300 ease-in-out hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-red-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <div class="text-white mb-6 relative z-10">
                            <svg class="w-20 h-20 mx-auto group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zM12 14v9m-9-9h18"></path>
                            </svg>
                        </div>
                        <h4 class="text-3xl font-extrabold text-white mb-4 relative z-10">Gestión de Titulaciones</h4>
                        <p class="text-base text-white opacity-90 mb-6 relative z-10">Administra las titulaciones y carreras disponibles.</p>
                        <div class="flex flex-col space-y-4 w-full relative z-10">
                            <a href="{{ route('admin.titulaciones.create') }}"
                                class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Nueva Titulación
                            </a>
                            <a href="{{ route('admin.titulaciones.index') }}"
                                class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Ver Titulaciones
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
