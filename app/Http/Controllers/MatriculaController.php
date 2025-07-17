<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Asignatura;
use App\Models\Matricula;
use App\Models\DetalleMatricula;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Titulacion;
use App\Models\Nivel;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with(['estudiante', 'periodo'])->get();
        return view('matriculas.index', compact('matriculas'));
    }



    public function create(Request $request)
    {
        $estudiantes = Estudiante::all();
        $periodos = Periodo::all();
        $titulaciones = Titulacion::all();
        $niveles = Nivel::all();

        $asignaturas = [];

        if ($request->filled('idtit') && $request->filled('idniv')) {
            $asignaturas = Asignatura::where('idtit', $request->idtit)
                ->where('idniv', $request->idniv)
                ->get();
        }

        return view('matriculas.create', compact('estudiantes', 'periodos', 'titulaciones', 'niveles', 'asignaturas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'idest' => 'required|string|exists:estudiantes,idest',
        'idper' => 'required|string|exists:periodos,idper',
        'idtit' => 'required|string|exists:titulaciones,idtit',
        'idniv' => 'required|string|exists:niveles,idniv',
        'asignaturas' => 'required|array|min:1',
    ]);

    // Verificar si el estudiante ya tiene matrícula anterior
    $ultimaMatricula = Matricula::where('idest', $request->idest)
        ->orderByDesc('fechamat')
        ->first();

    if ($ultimaMatricula) {
        // Validar que se matricule en la misma carrera
        if ($ultimaMatricula->idtit !== $request->idtit) {
            return back()->withErrors([
                'idtit' => 'Ya estás matriculado en otra carrera. No puedes cambiar de carrera.',
            ])->withInput();
        }

        // Validar que el nivel actual sea el siguiente al último
        $niveles = Nivel::pluck('idniv')->toArray();
        $indexUltimo = array_search($ultimaMatricula->idniv, $niveles);
        $indexNuevo = array_search($request->idniv, $niveles);

        if ($indexNuevo === false || $indexUltimo === false || $indexNuevo !== $indexUltimo + 1) {
            return back()->withErrors([
                'idniv' => 'Debes matricularte en el siguiente nivel de tu carrera (' . $niveles[$indexUltimo + 1] . ').',
            ])->withInput();
        }
    }

    // Insertar la matrícula
    DB::insert('INSERT INTO matriculas (idest, idper, idtit, idniv, fechamat) VALUES (?, ?, ?, ?, ?) RETURNING idmat', [
        $request->idest,
        $request->idper,
        $request->idtit,
        $request->idniv,
        now(),
    ]);

    // Obtener el idmat recién creado
    $idmat = DB::select('SELECT idmat FROM matriculas WHERE idest = ? AND idper = ?', [
        $request->idest,
        $request->idper
    ])[0]->idmat;

    foreach ($request->asignaturas as $asig) {
        DetalleMatricula::create([
            'idmat' => $idmat,
            'idasi' => $asig,
            'detalledet' => 'Asignado automáticamente por carrera y nivel',
        ]);
    }

    return redirect()->route('admin.matriculas.index')->with('success', 'Matrícula registrada correctamente.');
}

}
