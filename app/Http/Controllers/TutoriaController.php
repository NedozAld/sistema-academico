<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutoria;
use App\Models\DetalleMatricula;
use App\Models\Horario;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutoriaController extends Controller
{
    // ADMIN: Ver todas las tutorías
    public function index()
    {
        $tutorias = Tutoria::with([
            'detalle.asignatura',
            'detalle.matricula.estudiante',
        ])->get();

        return view('admin.tutorias.index', compact('tutorias'));
    }

    // ADMIN: Crear tutoría
    public function create()
    {
        $detalles = DetalleMatricula::with([
            'asignatura',
            'matricula.estudiante'
        ])
            ->whereHas('matricula.estudiante')
            ->get();

        $horarios = Horario::all();

        return view('admin.tutorias.create', compact('detalles', 'horarios'));
    }

    // ADMIN: Guardar tutoría
    public function store(Request $request)
    {
        $request->validate([
            'iddet' => 'required|exists:detallematriculas,iddet',
            'idhor' => 'required|exists:horarios,idhor',
            'detalletut' => 'required|string|max:100',
        ]);

        try {
            Tutoria::create([
                'iddet' => $request->iddet,
                'idhor' => $request->idhor,
                'detalletut' => $request->detalletut,
                'confirmada_profe' => false,
                'confirmada_est' => false,
            ]);

            return redirect()->route('admin.tutorias.index')
                ->with('success', 'Tutoría registrada correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al crear tutoría:', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);

            return back()->withInput()->withErrors([
                'error' => 'Error al registrar la tutoría: ' . $e->getMessage()
            ]);
        }
    }

    // PROFESOR: Ver tutorías que le corresponden
    public function profesorIndex()
    {
        $idpro = Auth::user()->id_relacionado;

        $tutorias = Tutoria::whereHas('detalle.asignatura', function ($query) use ($idpro) {
            $query->whereIn('idasi', function ($sub) use ($idpro) {
                $sub->select('idasi')
                    ->from('pro_asi')
                    ->where('idpro', $idpro);
            });
        })
        ->with(['detalle.asignatura', 'detalle.matricula.estudiante'])
        ->get();

        return view('profesores.tutorias.index', compact('tutorias'));
    }

    // PROFESOR: Confirmar tutoría
    public function profesorConfirmar($id)
    {
        $tutoria = Tutoria::findOrFail($id);
        $tutoria->confirmada_profe = true;
        $tutoria->save();

        return back()->with('success', 'Tutoría confirmada como profesor.');
    }

    // ESTUDIANTE: Ver sus tutorías
    public function estudianteIndex()
    {
        $idest = Auth::user()->id_relacionado;

        $tutorias = Tutoria::whereHas('detalle.matricula', function ($query) use ($idest) {
            $query->where('idest', $idest);
        })
        ->with(['detalle.asignatura'])
        ->get();

        return view('estudiante.tutorias.index', compact('tutorias'));
    }

    // ESTUDIANTE: Confirmar tutoría
    public function estudianteConfirmar($id)
    {
        $tutoria = Tutoria::findOrFail($id);
        $tutoria->confirmada_est = true;
        $tutoria->save();

        return back()->with('success', 'Has confirmado tu asistencia a la tutoría.');
    }
}
