<?php

namespace App\Http\Controllers;

use App\Models\ProAsi;
use App\Models\Profesor;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    public function index()
    {
        $asignaciones = ProAsi::with('profesor', 'asignatura')->get();
        return view('admin.asignaciones.index', compact('asignaciones'));
    }

    public function create()
    {
        $profesores = Profesor::all();
        $asignaturas = Asignatura::all();
        return view('admin.asignaciones.create', compact('profesores', 'asignaturas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpro' => 'required|exists:profesores,idpro',
            'idasi' => 'required|exists:asignaturas,idasi'
        ]);

        ProAsi::create($request->only('idpro', 'idasi'));

        return redirect()->route('admin.asignaciones.index')->with('success', 'Asignación creada correctamente.');
    }

    public function destroy($idpro, $idasi)
    {
        ProAsi::where('idpro', $idpro)->where('idasi', $idasi)->delete();

        return redirect()->route('admin.asignaciones.index')->with('success', 'Asignación eliminada.');
    }
}
