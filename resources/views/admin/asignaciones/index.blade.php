<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Listado de Asignaciones') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 to-purple-100 min-h-screen p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md" role="alert">
                    <div class="flex items-center">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">¡Éxito!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white shadow-2xl rounded-xl p-8 mb-6">
                <!-- Botón para Nueva Asignación -->
                <div class="mb-6 text-right">
                    <a href="{{ route('admin.asignaciones.create') }}"
                       class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                        <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Nueva Asignación
                    </a>
                </div>

                <!-- Tabla de Asignaciones -->
                <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
                    @if ($asignaciones->isEmpty())
                        <div class="px-6 py-8 text-center text-lg text-gray-600 italic bg-white rounded-lg">
                            No hay asignaciones registradas aún.
                            <p class="mt-2 text-sm text-gray-500">Haz clic en "Nueva Asignación" para empezar.</p>
                        </div>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tl-lg">
                                        Profesor
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Asignatura
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider rounded-tr-lg">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($asignaciones as $asig)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $asig->profesor->nombrespro ?? '—' }} {{ $asig->profesor->apellidospro ?? '' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $asig->asignatura->nombreasi ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <button type="button"
                                                    data-id-profesor="{{ $asig->idpro }}"
                                                    data-id-asignatura="{{ $asig->idasi }}"
                                                    class="delete-button inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                                <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm6 2a1 1 0 100 2h-4a1 1 0 100-2h4z" clip-rule="evenodd" />
                                                </svg>
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación -->
    <div id="deleteConfirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-auto">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <h3 class="mt-2 text-lg leading-6 font-medium text-gray-900">¿Estás seguro?</h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        Esta acción eliminará la asignación de forma permanente.
                        No podrás deshacer esta acción.
                    </p>
                </div>
            </div>
            <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="confirmDeleteButton"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Eliminar
                </button>
                <button type="button" id="cancelDeleteButton"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');
            const deleteConfirmationModal = document.getElementById('deleteConfirmationModal');
            const confirmDeleteButton = document.getElementById('confirmDeleteButton');
            const cancelDeleteButton = document.getElementById('cancelDeleteButton');
            const deleteForm = document.getElementById('deleteForm');
            let currentProfesorId = null;
            let currentAsignaturaId = null;

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    currentProfesorId = this.dataset.idProfesor;
                    currentAsignaturaId = this.dataset.idAsignatura;
                    deleteConfirmationModal.classList.remove('hidden');
                });
            });

            confirmDeleteButton.addEventListener('click', function () {
                if (currentProfesorId && currentAsignaturaId) {
                    // Asegúrate de que esta ruta sea correcta para tu aplicación Laravel
                    // Si tu ruta destroy espera ambos IDs en la URL, ajusta esto:
                    deleteForm.action = `/admin/asignaciones/${currentProfesorId}/${currentAsignaturaId}`;
                    deleteForm.submit();
                }
            });

            cancelDeleteButton.addEventListener('click', function () {
                deleteConfirmationModal.classList.add('hidden');
                currentProfesorId = null;
                currentAsignaturaId = null;
            });

            // Cerrar modal al hacer clic fuera
            deleteConfirmationModal.addEventListener('click', function(event) {
                if (event.target === deleteConfirmationModal) {
                    deleteConfirmationModal.classList.add('hidden');
                    currentProfesorId = null;
                    currentAsignaturaId = null;
                }
            });
        });
    </script>
</x-app-layout>
