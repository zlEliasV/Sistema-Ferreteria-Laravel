<?php

namespace App\Http\Controllers;

use App\Models\Condicion;
use Illuminate\Http\Request;

class CondicionController extends Controller
{

    public function index()
    {
        $condiciones = Condicion::all();
        return view('condiciones.index', compact('condiciones'));
    }

    public function create()
    {
        return view('condiciones.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'descripcion' => 'required|string|max:250|unique:condicion,descripcion',
        ]);
        Condicion::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('condiciones.index')->with('success', 'Condición creada exitosamente.');
    }

    public function show(Condicion $condicion)
    {

    }

    public function edit(Condicion $condicion)
    {

        return view('condiciones.edit', compact('condicion'));
    }

    public function update(Request $request, Condicion $condicion)
    {

        $request->validate([
            'descripcion' => 'required|string|max:250|unique:condicion,descripcion,' . $condicion->id_condicioniva . ',id_condicioniva', // 'unique' excluyendo la condición actual
        ]);

        $condicion->update([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('condiciones.index')->with('success', 'Condición actualizada exitosamente.');
    }

    public function destroy(Condicion $condicion)
    {
        try {
            $condicion->delete();
            return redirect()->route('condiciones.index')->with('success', 'Condición eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('condiciones.index')->with('error', 'No se pudo eliminar la condición. Asegúrate de que no esté relacionada con otros registros (ej. clientes o proveedores).');
        }
    }
}