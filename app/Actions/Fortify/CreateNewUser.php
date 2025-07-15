<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input): User
    {
        Validator::make($input, [
            'tipo_usuario' => ['required', 'in:estudiante,profesor,administrador'],
            'cedula' => ['required', 'string', 'max:10'],
            'nombres' => ['required', 'string', 'max:50'],
            'apellidos' => ['required', 'string', 'max:50'],
            'direccion' => ['nullable', 'string', 'max:100'],
            'telefono' => ['nullable', 'string', 'max:10'],
            'nacimiento' => ['nullable', 'date'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ])->validate();

        $tipo = $input['tipo_usuario'];
        $cedula = $input['cedula'];

        // Validar si ya existe un usuario con esa cédula
        if (User::where('id_relacionado', $cedula)->exists()) {
            throw ValidationException::withMessages([
                'cedula' => 'Ya existe un usuario registrado con esta cédula.',
            ]);
        }

        if ($tipo === 'estudiante') {
            if (Estudiante::find($cedula)) {
                throw ValidationException::withMessages([
                    'cedula' => 'Ya existe un estudiante con esta cédula.',
                ]);
            }

            Estudiante::create([
                'idest' => $cedula,
                'nombresest' => $input['nombres'],
                'apellidosest' => $input['apellidos'],
                'direccionest' => $input['direccion'] ?? '',
                'nacimientoest' => $input['nacimiento'] ?? now(),
            ]);
        } elseif ($tipo === 'profesor') {
            if (Profesor::find($cedula)) {
                throw ValidationException::withMessages([
                    'cedula' => 'Ya existe un profesor con esta cédula.',
                ]);
            }

            Profesor::create([
                'idpro' => $cedula,
                'nombrespro' => $input['nombres'],
                'apellidospro' => $input['apellidos'],
                'telefonopro' => $input['telefono'] ?? '',
            ]);
        } elseif ($tipo !== 'administrador') {
            throw ValidationException::withMessages([
                'tipo_usuario' => 'Tipo de usuario inválido.',
            ]);
        }

        return User::create([
            'name' => $input['nombres'] . ' ' . $input['apellidos'],
            'email' => strtolower(Str::random(10) . '@fake.local'), // correo generado aleatoriamente
            'password' => Hash::make($input['password']),
            'tipo_usuario' => $tipo,
            'id_relacionado' => $tipo === 'administrador' ? null : $cedula,
        ]);
    }
}
