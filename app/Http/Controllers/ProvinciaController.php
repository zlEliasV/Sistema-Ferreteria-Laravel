<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{

    public function index()
    {
        $provincias = Provincia::all();
        return view('provincias.index', compact('provincias'));
    }

    public function create()
    {
        return view('provincias.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'descripcion' => 'required|string|max:250|unique:provincias,descripcion',
        ]);

        Provincia::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('provincias.index')->with('success', 'Provincia creada exitosamente.');
    }

    public function show(Provincia $provincia)
    {

    }

    public function edit(Provincia $provincia)
    {
        return view('provincias.edit', compact('provincia'));
    }

    public function update(Request $request, Provincia $provincia)
    {
        // Validar los datos del formulario de actualización
        $request->validate([
            'descripcion' => 'required|string|max:250|unique:provincias,descripcion,' . $provincia->id_provincia . ',id_provincia', // 'unique' excluyendo la provincia actual
        ]);

 
        $provincia->update([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('provincias.index')->with('success', 'Provincia actualizada exitosamente.');
    }

    public function destroy(Provincia $provincia)
    {
        try {
            $provincia->delete();
            return redirect()->route('provincias.index')->with('success', 'Provincia eliminada exitosamente.');
        } catch (\Exception $e) {
           
            return redirect()->route('provincias.index')->with('error', 'No se pudo eliminar la provincia. Asegúrate de que no esté relacionada con otros registros (ej. clientes).');
        }
    }
}