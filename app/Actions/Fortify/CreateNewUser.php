<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use App\Models\Estudiante;
use App\Models\Profesor;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'tipo_usuario' => ['required', 'in:estudiante,profesor'],
            'cedula' => ['required', 'string', 'max:10'],
            'nombres' => ['required', 'string', 'max:50'],
            'apellidos' => ['required', 'string', 'max:50'],
            'direccion' => ['nullable', 'string', 'max:100'],
            'telefono' => ['nullable', 'string', 'max:10'],
            'nacimiento' => ['nullable', 'date'],
            'password' => $this->passwordRules(),
        ])->validate();

        $tipo = $input['tipo_usuario'];
        $cedula = $input['cedula'];

        if ($tipo === 'estudiante') {
            Estudiante::create([
                'idest' => $cedula,
                'nombresest' => $input['nombres'],
                'apellidosest' => $input['apellidos'],
                'direccionest' => $input['direccion'] ?? '',
                'nacimientoest' => $input['nacimiento'] ?? now(),
                // mailest generado automáticamente por trigger
            ]);
        } elseif ($tipo === 'profesor') {
            Profesor::create([
                'idpro' => $cedula,
                'nombrespro' => $input['nombres'],
                'apellidospro' => $input['apellidos'],
                'telefonopro' => $input['telefono'] ?? '',
                // correopro generado automáticamente por trigger
            ]);
        } else {
            throw ValidationException::withMessages(['tipo_usuario' => 'Tipo de usuario inválido.']);
        }

        return User::create([
            'name' => $input['nombres'] . ' ' . $input['apellidos'],
            'email' => strtolower(Str::random(10) . '@fake.local'), // se ignora porque el login es personalizado
            'password' => Hash::make($input['password']),
            'tipo_usuario' => $tipo,
            'id_relacionado' => $cedula,
        ]);
    }
}
