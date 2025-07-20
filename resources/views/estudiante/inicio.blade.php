<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Panel del Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 border border-gray-200">
                <div class="text-center mb-8">
                    <h3 class="text-4xl font-extrabold text-gray-900 mb-3">
                        ¡Bienvenido al <span class="text-blue-600">Panel del Estudiante</span>!
                    </h3>
                    <p class="text-lg text-gray-600">Aquí puedes gestionar todas tus actividades académicas.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    {{-- Tarjeta: Ir a mi perfil --}}
                    <a href="{{ route('estudiante.perfil') }}"
                       class="flex flex-col items-center justify-center p-6 bg-blue-500 text-white rounded-xl shadow-lg hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105 group">
                        <svg class="w-16 h-16 mb-4 group-hover:rotate-6 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="text-2xl font-bold text-center">Mi Perfil</span>
                        <p class="text-sm text-center opacity-90 mt-2">Visualiza y actualiza tu información personal.</p>
                    </a>

                    {{-- Tarjeta: Realizar Matrícula --}}
                    <a href="{{ route('estudiante.matricula.form') }}"
                       class="flex flex-col items-center justify-center p-6 bg-green-500 text-white rounded-xl shadow-lg hover:bg-green-600 transition duration-300 ease-in-out transform hover:scale-105 group">
                        <svg class="w-16 h-16 mb-4 group-hover:animate-pulse transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-2xl font-bold text-center">Realizar Matrícula</span>
                        <p class="text-sm text-center opacity-90 mt-2">Inscríbete en nuevas asignaturas o niveles.</p>
                    </a>

                    {{-- Tarjeta: Ver Materias Matriculadas --}}
                    <a href="{{ route('estudiante.materias') }}"
                       class="flex flex-col items-center justify-center p-6 bg-purple-500 text-white rounded-xl shadow-lg hover:bg-purple-600 transition duration-300 ease-in-out transform hover:scale-105 group">
                        <svg class="w-16 h-16 mb-4 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path></svg>
                        <span class="text-2xl font-bold text-center">Mis Materias</span>
                        <p class="text-sm text-center opacity-90 mt-2">Consulta tus asignaturas matriculadas.</p>
                    </a>
                </div>

                {{-- Sección de Anuncios/Noticias (Opcional, para un toque más dinámico) --}}
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Anuncios Importantes</h3>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md border border-gray-200">
                        <ul class="list-disc list-inside space-y-3 text-gray-700">
                            <li><strong class="text-gray-900">20 de Julio:</strong> Inicio del período de matrículas extraordinarias.</li>
                            <li><strong class="text-gray-900">25 de Julio:</strong> Recordatorio: Último día para pago de tasas de matrícula.</li>
                            <li><strong class="text-gray-900">1 de Agosto:</strong> Publicación de horarios definitivos.</li>
                        </ul>
                        <p class="text-right mt-4 text-sm text-gray-500">Mantente informado para no perderte nada.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
