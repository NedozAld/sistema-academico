<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Asignatura;
use App\Models\Matricula;
use App\Models\DetalleMatricula;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function create()
    {
        return view('matriculas.create', [
            'estudiantes' => Estudiante::all(),
            'periodos' => Periodo::all(),
            'asignaturas' => Asignatura::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idest' => 'required',
            'idper' => 'required',
            'asignaturas' => 'required|array|min:1',
        ]);

        $idmat = $request->idper . '-' . strtoupper(Str::random(4)); // simula trigger

        $matricula = Matricula::create([
            'idmat' => $idmat,
            'idest' => $request->idest,
            'idper' => $request->idper,
            'fechamat' => now(),
        ]);

        foreach ($request->asignaturas as $asig) {
            DetalleMatricula::create([
                'iddet' => strtoupper(Str::uuid()),
                'idmat' => $idmat,
                'idasi' => $asig,
                'detalledet' => 'Asignado desde administrador',
            ]);
        }

        return redirect()->route('matriculas.create')->with('success', 'Matrícula registrada correctamente.');
    }
}
