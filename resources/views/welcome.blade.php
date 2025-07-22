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
                /* Aplicamos un fondo sutil y color de texto por defecto */
                @apply bg-gray-50 text-gray-900;
            }
            a {
                /* Estilo base para enlaces, con transición suave */
                @apply text-red-600 hover:text-red-800 transition duration-300 ease-in-out;
            }
            .btn {
                /* Estilo para el botón principal, con sombra, esquinas redondeadas y efecto hover */
                @apply inline-flex items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl;
            }
            .btn-secondary {
                /* Estilo para el botón secundario, con borde, texto rojo y fondo blanco, y efecto hover */
                @apply inline-flex items-center px-8 py-4 border-2 border-red-600 text-base font-semibold rounded-full shadow-lg text-red-600 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl;
            }
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col">

    <!-- Navbar/Header Section -->
    <header class="bg-white shadow-lg py-4 sm:py-6">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center">
            <div class="flex-shrink-0 mb-4 sm:mb-0">
                <a href="/" class="text-3xl sm:text-4xl font-extrabold text-red-700 flex items-center group">
                    <!-- Icono de libro o graduación para el logo con efecto hover -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-9 w-9 sm:h-10 sm:w-10 mr-3 text-red-500 group-hover:text-red-700 transition duration-300 transform group-hover:rotate-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <span class="text-2xl sm:text-3xl">Sistema Académico UTN</span>
                </a>
            </div>
            <!-- Login/Register Links -->
            <div class="flex items-center space-x-4 sm:space-x-6">
                <!-- Suponiendo que estas rutas existen en su aplicación Laravel/PHP -->
                <a href="{{ route('login') }}" class="text-base sm:text-lg font-medium text-gray-700 hover:text-red-600 transition duration-300">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-base sm:text-lg font-medium text-gray-700 hover:text-red-600 transition duration-300">Registrarse</a>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="flex-grow flex flex-col items-center justify-center py-16 sm:py-24 lg:py-32 bg-gradient-to-br from-red-50 to-orange-100">

        <!-- Hero/Welcome Section -->
        <section class="text-center max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 sm:mb-20 lg:mb-24">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold leading-tight text-gray-900 mb-6 drop-shadow-md">
                Bienvenido al <span class="text-red-600">Sistema Académico</span>
            </h1>
            <p class="text-xl sm:text-2xl text-gray-700 mb-10 max-w-2xl mx-auto">
                Tu portal integral para gestionar cursos, calificaciones, horarios y recursos educativos de forma eficiente.
            </p>
            <a href="{{ route('login') }}" class="btn animate-bounce-slow">
                Acceder al Portal
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 -mr-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </a>
        </section>

        <!-- Enrollment Promotion Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 sm:mt-20 lg:mt-24 mb-20 sm:mb-24 lg:mb-32">
            <div class="bg-red-700 text-white rounded-2xl shadow-2xl p-8 sm:p-12 lg:p-16 text-center transform hover:scale-102 transition duration-500 ease-in-out border-4 border-red-500">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold mb-6 drop-shadow-md">
                    ¡Inicia tu futuro hoy!
                </h2>
                <p class="text-lg sm:text-xl lg:text-2xl mb-8 opacity-95 max-w-3xl mx-auto">
                    ¿Listo para matricularte en una de nuestras carreras? Regístrate ahora para acceder al portal de matrículas y dar el primer paso hacia tu futuro académico.
                </p>
                <!-- Botón para registrarse -->
                <a href="{{ route('register') }}" class="btn-secondary animate-fade-in">
                    Registrarme para Matrícula
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 -mr-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM12 18v-1.5m-3.75-3.75H12m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z" />
                    </svg>
                </a>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-900 text-white py-6 sm:py-8 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-sm sm:text-base">&copy; {{ date('Y') }} Universidad Técnica del Norte. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Custom Animations for Tailwind CSS JIT -->
    <style type="text/css">
        @keyframes bounce-slow {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite ease-in-out;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 1s ease-out forwards;
        }
    </style>
</body>
</html>
