<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Titulacion;
use App\Models\Nivel;
use App\Models\Asignatura;
use App\Models\Matricula;
use App\Models\DetalleMatricula;

class EstudianteController extends Controller
{
    public function inicio()
    {
        return view('estudiante.inicio');
    }

    public function index()
    {
        return $this->inicio();
    }

    public function perfil()
    {
        $user = Auth::user();

        if ($user->tipo_usuario !== 'estudiante') {
            abort(403, 'Acceso no autorizado');
        }

        $estudiante = Estudiante::findOrFail($user->id_relacionado);

        return view('estudiante.perfil', compact('estudiante'));
    }

    public function matriculaForm()
    {
        $user = Auth::user();
        $idest = $user->id_relacionado;
        $estudiante = Estudiante::findOrFail($idest);

        $periodos = Periodo::orderByDesc('inicioper')->get();
        $titulaciones = Titulacion::all();
        $niveles = Nivel::orderBy('idniv')->get();

        if ($periodos->isEmpty()) {
            return back()->with('error', 'No hay períodos académicos disponibles.');
        }

        if ($titulaciones->isEmpty()) {
            return back()->with('error', 'No hay titulaciones disponibles para matricularse.');
        }

        $ultimaMatricula = Matricula::where('idest', $idest)
            ->orderByDesc('fechamat')
            ->first();

        $asignaturas = [];

        if (!$ultimaMatricula) {
            // Primera matrícula
            $modo = 'primera';
            $nivelAsignado = $niveles->first(); // Nivel 1
            $periodoDisponible = $periodos->first(); // Último período

            return view('estudiante.matricula', compact(
                'modo',
                'estudiante',
                'titulaciones',
                'nivelAsignado',
                'periodoDisponible',
                'asignaturas'
            ));
        }

        $periodoActual = $periodos->first();

        if ($ultimaMatricula->idper === $periodoActual->idper) {
            // Ya matriculado en este período
            $modo = 'bloqueado';
            return view('estudiante.matricula', compact('modo', 'ultimaMatricula'));
        }

        // Verificar si hay un siguiente nivel
        $nivelesList = $niveles->pluck('idniv')->values();
        $indexAnterior = $nivelesList->search($ultimaMatricula->idniv);

        if ($indexAnterior !== false && isset($nivelesList[$indexAnterior + 1])) {
            $nivelAsignado = Nivel::find($nivelesList[$indexAnterior + 1]);
            $modo = 'avance';

            return view('estudiante.matricula', compact(
                'modo',
                'estudiante',
                'ultimaMatricula',
                'nivelAsignado',
                'periodoActual',
                'titulaciones'
            ));
        } else {
            // Ya no hay más niveles
            $modo = 'completo';
            return view('estudiante.matricula', compact('modo', 'ultimaMatricula'));
        }
    }

    public function registrarMatricula(Request $request)
    {
        $request->validate([
            'idper' => 'required|exists:periodos,idper',
            'idtit' => 'required|exists:titulaciones,idtit',
            'idniv' => 'required|exists:niveles,idniv',
            'asignaturas' => 'nullable|array|min:1',
        ]);

        $user = Auth::user();
        $estudiante = Estudiante::findOrFail($user->id_relacionado);

        // Verificar si ya está matriculado en ese período
        $yaExiste = Matricula::where('idest', $estudiante->idest)
            ->where('idper', $request->idper)
            ->exists();

        if ($yaExiste) {
            return back()->withErrors([
                'idper' => 'Ya estás matriculado en este período.',
            ])->withInput();
        }

        // Registrar matrícula
        $matricula = Matricula::create([
            'idest' => $estudiante->idest,
            'idper' => $request->idper,
            'idtit' => $request->idtit,
            'idniv' => $request->idniv,
            'fechamat' => now(),
        ]);

        if (is_array($request->asignaturas)) {
            foreach ($request->asignaturas as $idasi) {
                DetalleMatricula::create([
                    'idmat' => $matricula->idmat,
                    'idasi' => $idasi,
                    'detalledet' => 'Asignada automáticamente por el sistema',
                ]);
            }
        }

        return redirect()->route('estudiante.inicio')
            ->with('success', 'Matrícula realizada correctamente.');
    }
}
