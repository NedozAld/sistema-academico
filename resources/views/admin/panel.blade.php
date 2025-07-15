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
                    <h3 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">¡Bienvenido al Panel de Administración!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                        {{-- Tarjeta para Gestión de Departamentos --}}
                        <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-blue-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m8-10h1m-1 4h1m-1 4h1m-9-4h.01M7 16h.01"></path></svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Departamentos</h4>
                            <p class="text-gray-600 mb-6">Crea, edita y visualiza los departamentos de tu organización.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.departamentos.create') }}"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Crear Departamento
                                </a>
                                <a href="{{ route('admin.departamentos.index') }}"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                    Ver Departamentos
                                </a>
                            </div>
                        </div>

                        {{-- Tarjeta para Gestión de Áreas --}}
                        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <div class="text-green-600 mb-4">
                                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                            </div>
                            <h4 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Áreas</h4>
                            <p class="text-gray-600 mb-6">Registra y administra las áreas de trabajo dentro de los departamentos.</p>
                            <div class="flex flex-col space-y-4 w-full">
                                <a href="{{ route('admin.areas.create') }}"
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Registrar Área
                                </a>
                                <a href="{{ route('admin.areas.index') }}"
                                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full flex items-center justify-center transition duration-300 ease-in-out shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                    Ver Áreas Registradas
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Puedes añadir más secciones o tarjetas aquí según sea necesario --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
