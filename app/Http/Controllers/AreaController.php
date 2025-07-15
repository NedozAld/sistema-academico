<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Departamento;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::with('departamento')->get();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('admin.areas.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iddep' => 'required|exists:departamentos,iddep',
            'nombreare' => 'required|string|max:50',
        ]);

        // NO incluir 'idare', ya que lo crea el TRIGGER
        Area::create([
            'iddep' => $request->iddep,
            'nombreare' => $request->nombreare,
        ]);

        return redirect()->route('admin.areas.index')->with('success', 'Área registrada correctamente.');
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $departamentos = Departamento::all();
        return view('admin.areas.edit', compact('area', 'departamentos'));
    }

    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);

        $request->validate([
            'nombreare' => 'required|string|max:50',
            'iddep' => 'required|exists:departamentos,iddep',
        ]);

        $area->update([
            'nombreare' => $request->nombreare,
            'iddep' => $request->iddep,
        ]);

        return redirect()->route('admin.areas.index')->with('success', 'Área actualizada correctamente.');
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->route('admin.areas.index')->with('success', 'Área eliminada correctamente.');
    }
}
