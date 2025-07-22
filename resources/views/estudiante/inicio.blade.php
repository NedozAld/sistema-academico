<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-4xl text-gray-900 leading-tight tracking-tight">
            {{ __('Panel del Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen font-sans antialiased">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-2xl shadow-blue-200 sm:rounded-3xl p-8 lg:p-12 border border-gray-200 backdrop-blur-sm">
                <div class="text-center mb-12">
                    <h3 class="text-6xl font-extrabold text-gray-900 mb-4 leading-tight">
                        ¡Bienvenido al <span class="text-blue-600 drop-shadow-lg">Panel del Estudiante</span>!
                    </h3>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto mt-4">Aquí puedes gestionar todas tus actividades académicas de forma sencilla, eficiente y con acceso rápido a lo que necesitas.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
                    {{-- Tarjeta: Ir a mi perfil --}}
                    <a href="{{ route('estudiante.perfil') }}"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-3 hover:scale-105 group relative overflow-hidden ring-2 ring-blue-400 ring-opacity-60">
                        <div class="absolute inset-0 bg-blue-800 opacity-15 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-700 ease-out origin-bottom-right"></div>
                        <svg class="w-24 h-24 mb-6 text-blue-200 group-hover:text-white group-hover:rotate-[15deg] transition duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="text-4xl font-extrabold text-center relative z-10 drop-shadow-md">Mi Perfil</span>
                        <p class="text-base text-center opacity-95 mt-3 relative z-10">Visualiza y actualiza tu información personal.</p>
                    </a>

                    {{-- Tarjeta: Realizar Matrícula --}}
                    <a href="{{ route('estudiante.matricula.form') }}"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-green-500 to-green-700 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-3 hover:scale-105 group relative overflow-hidden ring-2 ring-green-400 ring-opacity-60">
                        <div class="absolute inset-0 bg-green-800 opacity-15 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-700 ease-out origin-top-left"></div>
                        <svg class="w-24 h-24 mb-6 text-green-200 group-hover:text-white group-hover:animate-pulse transition duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-4xl font-extrabold text-center relative z-10 drop-shadow-md">Realizar Matrícula</span>
                        <p class="text-base text-center opacity-95 mt-3 relative z-10">Inscríbete en nuevas asignaturas o niveles.</p>
                    </a>

                    {{-- Tarjeta: Ver Materias Matriculadas --}}
                    <a href="{{ route('estudiante.materias') }}"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-purple-500 to-purple-700 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-3 hover:scale-105 group relative overflow-hidden ring-2 ring-purple-400 ring-opacity-60">
                        <div class="absolute inset-0 bg-purple-800 opacity-15 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-700 ease-out origin-bottom-left"></div>
                        <svg class="w-24 h-24 mb-6 text-purple-200 group-hover:text-white group-hover:scale-110 transition duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                        <span class="text-4xl font-extrabold text-center relative z-10 drop-shadow-md">Mis Materias</span>
                        <p class="text-base text-center opacity-95 mt-3 relative z-10">Consulta tus asignaturas matriculadas.</p>
                    </a>

                    {{-- Nueva Tarjeta: Mis Tutorías --}}
                    <a href="{{ route('estudiante.tutorias.index') }}"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-yellow-500 to-yellow-700 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-3 hover:scale-105 group relative overflow-hidden ring-2 ring-yellow-400 ring-opacity-60">
                        <div class="absolute inset-0 bg-yellow-800 opacity-15 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-700 ease-out origin-top-right"></div>
                        <svg class="w-24 h-24 mb-6 text-yellow-200 group-hover:text-white group-hover:animate-bounce transition duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span class="text-4xl font-extrabold text-center relative z-10 drop-shadow-md">Mis Tutorías</span>
                        <p class="text-base text-center opacity-95 mt-3 relative z-10">Gestiona y revisa tus sesiones de tutoría.</p>
                    </a>

                    {{-- Tarjeta de ejemplo adicional (puedes añadir más según necesites) --}}
                    <a href="{{ route('estudiante.historial') }}"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-red-500 to-red-700 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-3 hover:scale-105 group relative overflow-hidden ring-2 ring-red-400 ring-opacity-60">
                        <div class="absolute inset-0 bg-red-800 opacity-15 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-700 ease-out origin-center"></div>
                        <svg class="w-24 h-24 mb-6 text-red-200 group-hover:text-white group-hover:animate-spin transition duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="text-4xl font-extrabold text-center relative z-10 drop-shadow-md">Historial Académico</span>
                        <p class="text-base text-center opacity-95 mt-3 relative z-10">Revisa tu progreso y calificaciones pasadas.</p>
                    </a>

                    {{-- Otra Tarjeta de ejemplo (descomenta si la necesitas) 
                    <a href="#"
                       class="flex flex-col items-center justify-center p-8 bg-gradient-to-br from-indigo-500 to-indigo-700 text-white rounded-3xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out transform hover:-translate-y-3 hover:scale-105 group relative overflow-hidden ring-2 ring-indigo-400 ring-opacity-60">
                        <div class="absolute inset-0 bg-indigo-800 opacity-15 rounded-3xl transform scale-0 group-hover:scale-100 transition-transform duration-700 ease-out origin-top"></div>
                        <svg class="w-24 h-24 mb-6 text-indigo-200 group-hover:text-white group-hover:scale-105 transition duration-500 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.341-.171m0 0L9 14h4m-7 0l-4 4h16"></path></svg>
                        <span class="text-4xl font-extrabold text-center relative z-10 drop-shadow-md">Soporte</span>
                        <p class="text-base text-center opacity-95 mt-3 relative z-10">Obtén ayuda y resuelve tus dudas.</p>
                    </a>--}}
                </div>

                {{-- Sección de Anuncios/Noticias --}}
                <div class="mt-16 pt-10 border-t border-gray-200">
                    <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Anuncios Importantes</h3>
                    <div class="bg-gray-50 p-8 rounded-2xl shadow-xl border border-blue-100 relative overflow-hidden hover:shadow-blue-300 transition duration-300">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 bg-blue-500 text-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </div>
                        <ul class="list-disc list-inside space-y-4 text-gray-700 text-lg">
                            <li><strong class="text-blue-700 font-semibold">20 de Julio:</strong> Inicio del período de matrículas extraordinarias. ¡No te quedes sin cupo!</li>
                            <li><strong class="text-blue-700 font-semibold">25 de Julio:</strong> Recordatorio: Último día para pago de tasas de matrícula. Evita recargos.</li>
                            <li><strong class="text-blue-700 font-semibold">1 de Agosto:</strong> Publicación de horarios definitivos. Revisa tu planificación académica.</li>
                            <li><strong class="text-blue-700 font-semibold">8 de Agosto:</strong> Charla informativa sobre oportunidades de becas. ¡Inscríbete!</li>
                        </ul>
                        <p class="text-right mt-6 text-md text-gray-500 italic">Mantente informado para no perderte ninguna novedad importante.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
