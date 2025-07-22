<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Panel del Profesor') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl p-8 lg:p-12 border border-gray-200">
                <div class="text-center mb-10">
                    <h3 class="text-5xl font-extrabold text-gray-900 mb-4 leading-tight">
                        ¡Bienvenido, <span class="text-purple-600">Profesor</span>!
                    </h3>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">Aquí puedes gestionar tus cursos, tutorías y actividades académicas.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
                    {{-- Tarjeta: Ir a mi perfil --}}
                    <a href="{{ route('profesor.perfil') }}"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-blue-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <svg class="w-20 h-20 mb-6 group-hover:rotate-6 transition duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="text-3xl font-extrabold text-center relative z-10">Mi Perfil</span>
                        <p class="text-base text-center opacity-90 mt-3 relative z-10">Visualiza y actualiza tu información personal.</p>
                    </a>

                    {{-- Tarjeta: Mis Tutorías Asignadas --}}
                    <a href="{{ route('profesor.tutorias.index') }}"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-green-500 to-green-600 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-green-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <svg class="w-20 h-20 mb-6 group-hover:animate-pulse transition duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-3xl font-extrabold text-center relative z-10">Mis Tutorías</span>
                        <p class="text-base text-center opacity-90 mt-3 relative z-10">Gestiona y revisa tus sesiones de tutoría.</p>
                    </a>

                    {{-- Tarjeta de ejemplo: Gestionar Cursos 
                    <a href="#"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-orange-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <svg class="w-20 h-20 mb-6 group-hover:scale-110 transition duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                        <span class="text-3xl font-extrabold text-center relative z-10">Gestionar Cursos</span>
                        <p class="text-base text-center opacity-90 mt-3 relative z-10">Administra tus cursos y asignaturas.</p>
                    </a>

                    {{-- Tarjeta de ejemplo: Reportes y Calificaciones 
                    <a href="#"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-teal-500 to-teal-600 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-teal-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <svg class="w-20 h-20 mb-6 group-hover:animate-bounce transition duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <span class="text-3xl font-extrabold text-center relative z-10">Reportes</span>
                        <p class="text-base text-center opacity-90 mt-3 relative z-10">Accede a reportes y calificaciones.</p>
                    </a>

                    {{-- Tarjeta de ejemplo: Anuncios 
                    <a href="#"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-red-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <svg class="w-20 h-20 mb-6 group-hover:animate-spin transition duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="text-3xl font-extrabold text-center relative z-10">Anuncios</span>
                        <p class="text-base text-center opacity-90 mt-3 relative z-10">Publica y revisa comunicados importantes.</p>
                    </a>

                    {{-- Tarjeta de ejemplo: Soporte -
                    <a href="#"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-indigo-500 to-indigo-600 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-2 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-indigo-700 opacity-10 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-500 ease-out"></div>
                        <svg class="w-20 h-20 mb-6 group-hover:scale-105 transition duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.341-.171m0 0L9 14h4m-7 0l-4 4h16"></path></svg>
                        <span class="text-3xl font-extrabold text-center relative z-10">Soporte</span>
                        <p class="text-base text-center opacity-90 mt-3 relative z-10">Obtén ayuda y resuelve tus dudas.</p>
                    </a>--}}
                </div>

                {{-- Sección de Anuncios Importantes (Ejemplo, puedes adaptar el contenido) --}}
                <div class="mt-16 pt-10 border-t border-gray-200">
                    <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Anuncios y Novedades</h3>
                    <div class="bg-gray-50 p-8 rounded-2xl shadow-xl border border-purple-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 bg-purple-500 text-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <ul class="list-disc list-inside space-y-4 text-gray-700 text-lg">
                            <li><strong class="text-purple-700 font-semibold">15 de Julio:</strong> Recordatorio: Fecha límite para subir calificaciones del semestre actual.</li>
                            <li><strong class="text-purple-700 font-semibold">22 de Julio:</strong> Reunión de coordinación departamental a las 10:00 AM en Sala 3.</li>
                            <li><strong class="text-purple-700 font-semibold">5 de Agosto:</strong> Taller de nuevas metodologías de enseñanza. ¡Inscríbete!</li>
                        </ul>
                        <p class="text-right mt-6 text-md text-gray-500 italic">Mantente actualizado con las últimas noticias y eventos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
