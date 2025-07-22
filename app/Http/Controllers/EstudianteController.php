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
use Illuminate\Support\Facades\Log;

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
        
        Log::info('Titulaciones encontradas: ' . $titulaciones->count());
        if (!$titulaciones->isEmpty()) {
            Log::info('Primera titulación: ' . $titulaciones->first()->nombretit);
        }

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
        Matricula::create([
            'idest' => $estudiante->idest,
            'idper' => $request->idper,
            'idtit' => $request->idtit,
            'idniv' => $request->idniv,
            'fechamat' => now(),
        ]);

        // Recuperar la matrícula recién creada con el valor de idmat generado por el trigger
        $matricula = Matricula::where('idest', $estudiante->idest)
            ->where('idper', $request->idper)
            ->latest('fechamat')
            ->first();


        // Buscar asignaturas correspondientes a esa titulación y nivel
        $asignaturas = Asignatura::where('idtit', $request->idtit)
            ->where('idniv', $request->idniv)
            ->get();

        foreach ($asignaturas as $asignatura) {
            DetalleMatricula::create([
                'idmat' => $matricula->idmat,
                'idasi' => $asignatura->idasi,
                'detalledet' => 'Asignada automáticamente por el sistema',
            ]);
        }

        return redirect()->route('estudiante.inicio')
            ->with('success', 'Matrícula realizada correctamente.');
    }


    public function verMaterias()
    {
        $user = Auth::user();
        $estudiante = Estudiante::findOrFail($user->id_relacionado);

        // Incluye explícitamente las relaciones para evitar null
        $matricula = Matricula::with([
            'periodo:idper,detalleper',
            'titulacion:idtit,detalletit',
            'nivel:idniv,nombreniv',
            'detalles.asignatura'
        ])
            ->where('idest', $estudiante->idest)
            ->orderByDesc('fechamat')
            ->first();

        if (!$matricula) {
            return view('estudiante.materias', [
                'matricula' => null,
                'asignaturas' => []
            ]);
        }

        $asignaturas = $matricula->detalles->map(fn($detalle) => $detalle->asignatura);

        return view('estudiante.materias', [
            'matricula' => $matricula,
            'asignaturas' => $asignaturas
        ]);
    }
}
