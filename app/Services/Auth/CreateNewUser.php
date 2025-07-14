<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateNewUser
{
    public function create(array $input): User
    {
        Validator::make($input, [
            'tipo_usuario' => ['required', Rule::in(['estudiante', 'profesor'])],
            'cedula' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'direccion' => ['nullable', 'string', 'max:100'],
            'telefono' => ['nullable', 'string', 'max:10'],
            'nacimiento' => ['nullable', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            $tipo = $input['tipo_usuario'];
            $cedula = $input['cedula'];

            if ($tipo === 'estudiante') {
                $est = Estudiante::create([
                    'idest' => $cedula,
                    'nombresest' => $input['name'],
                    'apellidosest' => $input['apellido'],
                    'direccionest' => $input['direccion'] ?? '',
                    'nacimientoest' => $input['nacimiento'] ?? now(),
                    // mailest generado por trigger
                ]);

                return User::create([
                    'name' => $input['name'] . ' ' . $input['apellido'],
                    'email' => $cedula . '@fake.local', // único temporal
                    'password' => Hash::make($input['password']),
                    'tipo_usuario' => 'estudiante',
                    'id_relacionado' => $cedula,
                ]);
            }

            if ($tipo === 'profesor') {
                $pro = Profesor::create([
                    'idpro' => $cedula,
                    'nombrespro' => $input['name'],
                    'apellidospro' => $input['apellido'],
                    'telefonopro' => $input['telefono'] ?? '',
                    'idare' => null,
                    // correopro generado por trigger
                ]);

                return User::create([
                    'name' => $input['name'] . ' ' . $input['apellido'],
                    'email' => $cedula . '@fake.local', // único temporal
                    'password' => Hash::make($input['password']),
                    'tipo_usuario' => 'profesor',
                    'id_relacionado' => $cedula,
                ]);
            }

            throw new \Exception('Tipo de usuario no reconocido');
        });
    }
}
