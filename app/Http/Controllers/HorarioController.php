<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Dia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('admin.horarios.index', compact('horarios'));
    }


    public function create()
    {
        $dias = Dia::all();
        return view('admin.horarios.create', compact('dias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iniciohor' => 'required|date_format:H:i',
            'finhor'    => 'required|date_format:H:i|after:iniciohor',
            'iddia'     => 'required|exists:dias,iddia',
        ]);


        Horario::create([
            'iniciohor' => $request->iniciohor,
            'finhor'    => $request->finhor,
            'iddia'     => $request->iddia,
        ]);

        return redirect()->route('admin.horarios.index')->with('success', 'Horario creado correctamente.');
    }
}
