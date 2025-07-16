<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;

class NivelController extends Controller
{
    public function index()
    {
        $niveles = Nivel::all();
        return view('admin.niveles.index', compact('niveles'));
    }

    public function create()
    {
        return view('admin.niveles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreniv' => 'required|string|max:30',
        ]);

        Nivel::create([
            'nombreniv' => $request->nombreniv
        ]);

        return redirect()->route('admin.niveles.index')->with('success', 'Nivel registrado correctamente.');
    }
}
