<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('admin.departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('admin.departamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombredep' => 'required|string|max:50',
        ]);

        Departamento::create([
            // iddep NO se pasa, lo generará el trigger en PostgreSQL
            'nombredep' => $request->nombredep,
        ]);

        return redirect()->route('admin.departamentos.index')
            ->with('success', 'Departamento registrado correctamente.');
    }
}
