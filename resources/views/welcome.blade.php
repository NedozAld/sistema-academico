<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Técnica del Norte – Sistema Académico</title>

    <!-- Favicon de la UTN -->
    <link rel="shortcut icon" type="image/png" href="https://portal.utn.edu.ec/wp-content/uploads/2021/06/icono.png">

    <!-- Fonts - Usamos Inter para un look más moderno y limpio -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configuración JIT de Tailwind para estilos personalizados (Rojo y Blanco) -->
    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Inter', sans-serif;
                @apply bg-gray-50 text-gray-900;
            }
            a {
                @apply text-red-600 hover:text-red-800 transition duration-300 ease-in-out;
            }
            .btn {
                @apply inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out transform hover:scale-105;
            }
            .btn-secondary {
                @apply inline-flex items-center px-6 py-3 border border-red-600 text-base font-medium rounded-full shadow-lg text-red-600 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out transform hover:scale-105;
            }
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col">

    <!-- Navbar/Header Section -->
    <header class="bg-white shadow-lg py-4">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex-shrink-0">
                <a href="/" class="text-3xl font-extrabold text-red-700 flex items-center">
                    <!-- Icono de libro o graduación para el logo -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    Sistema Académico UTN
                </a>
            </div>
            <!-- Login/Register Links -->
            <div class="flex items-center space-x-6">
                <!-- Suponiendo que estas rutas existen en su aplicación Laravel/PHP -->
                <a href="{{ route('login') }}" class="text-base font-medium text-gray-700 hover:text-red-600">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-base font-medium text-gray-700 hover:text-red-600">Registrarse</a>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="flex-grow flex flex-col items-center justify-center py-16 sm:py-24 bg-gradient-to-r from-red-50 to-red-100">

        <!-- Hero/Welcome Section -->
        <section class="text-center max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold leading-tight text-gray-900 mb-6">
                Bienvenido al <span class="text-red-600">Sistema Académico</span>
            </h1>
            <p class="text-xl sm:text-2xl text-gray-700 mb-10">
                Tu portal integral para gestionar cursos, calificaciones, horarios y recursos educativos.
            </p>
            <a href="" class="btn">
                Acceder al Portal
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 -mr-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </a>
        </section>

        <!-- Enrollment Promotion Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 mb-20">
            <div class="bg-red-700 text-white rounded-xl shadow-2xl p-8 sm:p-12 text-center">
                <h2 class="text-4xl sm:text-5xl font-extrabold mb-6">
                    ¡Inicia tu futuro hoy!
                </h2>
                <p class="text-lg sm:text-xl mb-8 opacity-90">
                    ¿Listo para matricularte en unas de Nuestras carreras? Regístrate ahora para acceder al portal de matrículas y dar el primer paso hacia tu futuro académico.
                </p>
                <!-- Botón para registrarse -->
                <a href="{{ route('register') }}" class="btn-secondary">
                    Registrarme para Matrícula
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 -mr-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM12 18v-1.5m-3.75-3.75H12m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z" />
                    </svg>
                </a>
            </div>
        </section>
    </main>

    <!-- Footer Section (Optional, you can add more details here) -->
    <footer class="bg-gray-800 text-white py-6 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p>&copy; {{ date('Y') }} Universidad Técnica del Norte. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
