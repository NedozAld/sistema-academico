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
    public function index()
    {
        $matriculas = Matricula::with(['estudiante', 'periodo'])->get();
        return view('matriculas.index', compact('matriculas'));
    }

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
            'idest' => 'required|string|exists:estudiantes,idest',
            'idper' => 'required|string|exists:periodos,idper',
            'asignaturas' => 'required|array|min:1',
        ]);

        // Se asume que el trigger genera el ID, así que no lo colocamos
        $matricula = Matricula::create([
            'idest' => $request->idest,
            'idper' => $request->idper,
            'fechamat' => now(),
        ]);

        foreach ($request->asignaturas as $asig) {
            DetalleMatricula::create([
                'idmat' => $matricula->idmat,
                'idasi' => $asig,
                'detalledet' => 'Asignado desde administrador',
            ]);
        }

        return redirect()->route('admin.matriculas.index')->with('success', 'Matrícula registrada correctamente.');
    }
}
