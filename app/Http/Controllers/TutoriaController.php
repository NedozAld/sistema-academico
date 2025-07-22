<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutoria;
use App\Models\DetalleMatricula;
use App\Models\Horario;
use Illuminate\Support\Facades\Log;

class TutoriaController extends Controller
{
    public function index()
    {
        $tutorias = Tutoria::with([
            'detalle.asignatura',
            'detalle.matricula.estudiante',
        ])->get();

        return view('admin.tutorias.index', compact('tutorias'));
    }

    public function create()
    {
        // Cargar detalles con las relaciones necesarias
        $detalles = DetalleMatricula::with([
            'asignatura',
            'matricula.estudiante'
        ])
            ->whereHas('matricula')
            ->whereHas('matricula.estudiante')
            ->get();

        // Debug: verificar datos
        Log::info('Detalles cargados:', [
            'total' => $detalles->count(),
            'primer_detalle' => $detalles->first() ? [
                'iddet' => $detalles->first()->iddet,
                'estudiante_nombres' => $detalles->first()->matricula?->estudiante?->nombresest,
                'estudiante_apellidos' => $detalles->first()->matricula?->estudiante?->apellidosest,
                'asignatura' => $detalles->first()->asignatura?->nombreasi,
            ] : null
        ]);

        $horarios = Horario::all();

        return view('admin.tutorias.create', compact('detalles', 'horarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iddet' => 'required|exists:detallematriculas,iddet',
            'idhor' => 'required|exists:horarios,idhor',
            'detalletut' => 'required|string|max:100',
        ]);

        try {
            // El trigger se encargará de generar el idtut automáticamente
            // NO incluir idtut en el create para que el trigger funcione
            Tutoria::create([
                'iddet' => $request->iddet,
                'idhor' => $request->idhor,
                'detalletut' => $request->detalletut,
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
}
