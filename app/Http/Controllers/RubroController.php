<?php

namespace App\Http\Controllers;

use App\Models\Rubro; 
use Illuminate\Http\Request;

class RubroController extends Controller
{
    public function index()
    {
        $rubros = Rubro::all();
        return view('rubros.index', compact('rubros'));
    }

    public function create()
    {
        return view('rubros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:rubros,nombre', // Validación para el nombre del rubro
        ]);

        Rubro::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('rubros.index')->with('success', 'Rubro creado exitosamente.');
    }

    public function show(Rubro $rubro)
    {
        return view('rubros.show', compact('rubro'));
    }

    public function edit(Rubro $rubro)
    {
        return view('rubros.edit', compact('rubro'));
    }

    public function update(Request $request, Rubro $rubro)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:rubros,nombre,' . $rubro->id,
        ]);

        $rubro->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('rubros.index')->with('success', 'Rubro actualizado exitosamente.');
    }

    public function destroy(Rubro $rubro)
    {
        try {
            $rubro->delete();
            return redirect()->route('rubros.index')->with('success', 'Rubro eliminado exitosamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar la excepción si el rubro tiene productos asociados
            return redirect()->route('rubros.index')->with('error', 'No se puede eliminar el rubro porque tiene productos asociados. Primero elimine los productos asociados.');
        }
    }
}