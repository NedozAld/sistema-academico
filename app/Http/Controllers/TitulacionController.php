<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titulacion;

class TitulacionController extends Controller
{
    public function index()
    {
        $titulaciones = Titulacion::all();
        return view('admin.titulaciones.index', compact('titulaciones'));
    }

    public function create()
    {
        return view('admin.titulaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'detalletit' => 'required|string|max:100',
            'nivelestit' => 'required|integer',
        ]);

        Titulacion::create($request->only(['detalletit', 'nivelestit']));

        return redirect()->route('admin.titulaciones.index')->with('success', 'Titulación registrada correctamente.');
    }
}
