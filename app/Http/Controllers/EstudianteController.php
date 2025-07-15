<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    public function index()
    {
        return view('estudiante.inicio');
    }

    public function perfil()
    {
        $idest = Auth::user()->id_relacionado;
        $estudiante = Estudiante::findOrFail($idest);

        return view('estudiante.perfil', compact('estudiante'));
    }
}
