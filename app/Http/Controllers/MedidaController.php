<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{

    public function index()
    {
        $medidas = Medida::all();
        return view('medidas.index', compact('medidas'));
    }

    public function create()
    {
        return view('medidas.create');
    }

    public function store(Request $request)
    {
  
        $request->validate([
            'descripcion' => 'required|string|max:250|unique:medidas,descripcion',
            'abreviatura' => 'nullable|string|max:50',
        ]);

        Medida::create([
            'descripcion' => $request->descripcion,
            'abreviatura' => $request->abreviatura,
        ]);

        return redirect()->route('medidas.index')->with('success', 'Medida creada exitosamente.');
    }

    public function show(Medida $medida)
    {

    }

    public function edit(Medida $medida)
    {
        return view('medidas.edit', compact('medida'));
    }

    public function update(Request $request, Medida $medida)
    {

        $request->validate([
            'descripcion' => 'required|string|max:250|unique:medidas,descripcion,' . $medida->id_medida . ',id_medida', // 'unique' excluyendo la medida actual
            'abreviatura' => 'nullable|string|max:50',
        ]);

        $medida->update([
            'descripcion' => $request->descripcion,
            'abreviatura' => $request->abreviatura,
        ]);

        return redirect()->route('medidas.index')->with('success', 'Medida actualizada exitosamente.');
    }

    public function destroy(Medida $medida)
    {
        try {
            $medida->delete();
            return redirect()->route('medidas.index')->with('success', 'Medida eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('medidas.index')->with('error', 'No se pudo eliminar la medida. Asegúrate de que no esté relacionada con otros registros (ej. productos).');
        }
    }
}