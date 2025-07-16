<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Titulacion;
use App\Models\Nivel;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::with(['titulacion', 'nivel'])->get();
        return view('admin.asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        $titulaciones = Titulacion::all();
        $niveles = Nivel::all();
        return view('admin.asignaturas.create', compact('titulaciones', 'niveles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idasi' => 'required|string|max:10|unique:asignaturas,idasi',
            'idtit' => 'required|exists:titulaciones,idtit',
            'idniv' => 'required|exists:niveles,idniv',
            'nombreasi' => 'required|string|max:50',
            'teoricosasi' => 'required|integer|min:0',
            'practicosasi' => 'required|integer|min:0',
        ]);

        Asignatura::create($request->all());

        return redirect()->route('admin.asignaturas.index')->with('success', 'Asignatura registrada correctamente.');
    }
}
