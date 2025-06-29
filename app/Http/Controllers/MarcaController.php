<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'marcas_descripcion' => 'required|string|max:250|unique:marcas,marcas_descripcion',
 
        ]);

        Marca::create([
            'marcas_descripcion' => $request->marcas_descripcion,

        ]);

        return redirect()->route('marcas.index')->with('success', 'Marca creada exitosamente.');
    }

    public function show(Marca $marca)
    {

        return view('marcas.show', compact('marca'));
    }

    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'marcas_descripcion' => 'required|string|max:250|unique:marcas,marcas_descripcion,' . $marca->id_marcas . ',id_marcas',
        ]);

        $marca->update([
            'marcas_descripcion' => $request->marcas_descripcion,
        ]);

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada exitosamente.');
    }


    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('marcas.index')->with('success', 'Marca eliminada exitosamente.');
    }
}