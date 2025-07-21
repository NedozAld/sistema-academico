<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfesorController extends Controller
{
    public function inicio()
    {
        return view('profesores.inicio');
    }


    public function index()
    {
        $profesores = Profesor::with('area')->get();
        return view('profesores.index', compact('profesores'));
    }


    public function create()
    {
        $areas = Area::all();
        return view('profesores.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpro' => 'required|string|unique:profesores,idpro',
            'nombrespro' => 'required|string|max:50',
            'apellidospro' => 'required|string|max:50',
            'telefonopro' => 'required|string|max:10',
            'idare' => 'required|exists:areas,idare'
        ]);

        // Crear profesor (el trigger generará el correo)
        Profesor::create($request->only([
            'idpro',
            'nombrespro',
            'apellidospro',
            'telefonopro',
            'idare'
        ]));

        // Volver a obtener el profesor con el correo generado por el trigger
        $profesor = Profesor::findOrFail($request->idpro);

        // Crear usuario asociado
        User::create([
            'name' => $profesor->nombrespro . ' ' . $profesor->apellidospro,
            'email' => $profesor->correopro,
            'password' => Hash::make($profesor->idpro),
            'tipo_usuario' => 'profesor',
            'id_relacionado' => $profesor->idpro,
        ]);

        return redirect()->route('admin.profesores.index')->with('success', 'Profesor registrado correctamente.');
    }

    public function edit($idpro)
    {
        $profesor = Profesor::findOrFail($idpro);
        $areas = Area::all();
        return view('profesores.edit', compact('profesor', 'areas'));
    }

    public function update(Request $request, $idpro)
    {
        $profesor = Profesor::findOrFail($idpro);

        $request->validate([
            'nombrespro' => 'required|string|max:50',
            'apellidospro' => 'required|string|max:50',
            'telefonopro' => 'required|string|max:10',
            'idare' => 'required|exists:areas,idare'
        ]);

        $profesor->update($request->only([
            'nombrespro',
            'apellidospro',
            'telefonopro',
            'idare'
        ]));

        // Actualiza también el nombre del usuario relacionado
        $user = User::where('id_relacionado', $profesor->idpro)->first();
        if ($user) {
            $user->name = $profesor->nombrespro . ' ' . $profesor->apellidospro;
            $user->save();
        }

        return redirect()->route('admin.profesores.index')->with('success', 'Profesor actualizado correctamente.');
    }

    public function destroy($idpro)
    {
        $profesor = Profesor::findOrFail($idpro);

        // Elimina también el usuario relacionado
        User::where('id_relacionado', $idpro)->delete();

        $profesor->delete();

        return redirect()->route('admin.profesores.index')->with('success', 'Profesor eliminado correctamente.');
    }

    public function perfil()
    {
        $user = Auth::user();

        if ($user->tipo_usuario !== 'profesor') {
            abort(403, 'Acceso no autorizado');
        }

        $profesor = Profesor::with('area')->findOrFail($user->id_relacionado);

        return view('profesores.perfil', compact('profesor'));
    }
}
