<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Tipo de Usuario -->
        <div>
            <x-input-label for="tipo_usuario" :value="__('Tipo de usuario')" />
            <select id="tipo_usuario" name="tipo_usuario" required class="block mt-1 w-full">
                <option value="">-- Selecciona una opción --</option>
                <option value="estudiante" {{ old('tipo_usuario') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                <option value="profesor" {{ old('tipo_usuario') == 'profesor' ? 'selected' : '' }}>Profesor</option>
            </select>
            <x-input-error :messages="$errors->get('tipo_usuario')" class="mt-2" />
        </div>

        <!-- Cédula -->
        <div class="mt-4">
            <x-input-label for="cedula" :value="__('Cédula')" />
            <x-text-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')" required maxlength="10" autocomplete="off" />
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>

        <!-- Nombres -->
        <div class="mt-4">
            <x-input-label for="nombres" :value="__('Nombres')" />
            <x-text-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" required autocomplete="given-name" />
            <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Dirección (para estudiante) -->
        <div class="mt-4">
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" autocomplete="street-address" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Teléfono (para profesor) -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" autocomplete="tel" maxlength="10" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Fecha de nacimiento (para estudiante) -->
        <div class="mt-4">
            <x-input-label for="nacimiento" :value="__('Fecha de nacimiento')" />
            <x-text-input id="nacimiento" class="block mt-1 w-full" type="date" name="nacimiento" :value="old('nacimiento')" />
            <x-input-error :messages="$errors->get('nacimiento')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya tienes una cuenta?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
