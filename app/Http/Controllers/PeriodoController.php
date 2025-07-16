<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodoController extends Controller
{
    public function index()
    {
        $periodos = Periodo::all();
        return view('admin.periodos.index', compact('periodos'));
    }

    public function create()
    {
        return view('admin.periodos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'detalleper' => 'required|string|max:30',
            'inicioper' => 'required|date',
            'finper' => 'required|date|after_or_equal:inicioper',
        ]);

        Periodo::create($request->all());

        return redirect()->route('admin.periodos.index')->with('success', 'Periodo registrado correctamente.');
    }
}
