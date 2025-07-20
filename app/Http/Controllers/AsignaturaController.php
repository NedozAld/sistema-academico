<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Titulacion;
use App\Models\Nivel;

class AsignaturaController extends Controller
{
    // Vista para ver todas las asignaturas (admin)
    public function index()
    {
        $asignaturas = Asignatura::with(['titulacion', 'nivel'])->get();
        return view('admin.asignaturas.index', compact('asignaturas'));
    }

    // Formulario para crear una asignatura (admin)
    public function create()
    {
        $titulaciones = Titulacion::all();
        $niveles = Nivel::all();
        return view('admin.asignaturas.create', compact('titulaciones', 'niveles'));
    }

    // Guardar asignatura en la base de datos (admin)
    public function store(Request $request)
    {
        $request->validate([
            'idtit' => 'required|exists:titulaciones,idtit',
            'idniv' => 'required|exists:niveles,idniv',
            'nombreasi' => 'required|string|max:50',
            'teoricosasi' => 'required|integer|min:0',
            'practicosasi' => 'required|integer|min:0',
        ]);

        Asignatura::create([
            'idtit' => $request->idtit,
            'idniv' => $request->idniv,
            'nombreasi' => $request->nombreasi,
            'teoricosasi' => $request->teoricosasi,
            'practicosasi' => $request->practicosasi,
        ]);

        return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura registrada correctamente.');
    }

    // 🔹 NUEVO MÉTODO PARA LA API de matrícula
    public function porCarreraYNivel($idtit, $idniv)
    {
        $asignaturas = Asignatura::where('idtit', $idtit)
            ->where('idniv', $idniv)
            ->get(['idasi', 'nombreasi']);

        return response()->json($asignaturas);
    }
}
