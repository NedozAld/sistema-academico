<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dia;

class DiaController extends Controller
{
    public function index()
    {
        $dias = Dia::all();
        return view('admin.dias.index', compact('dias'));
    }


    public function create()
    {
        return view('admin.dias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombredia' => 'required|string|max:20',
        ]);

        Dia::create([
            'nombredia' => $request->nombredia,
        ]);

        return redirect()->route('admin.dias.index')->with('success', 'Día creado correctamente');
    }
}
