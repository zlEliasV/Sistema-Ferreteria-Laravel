<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Condicion;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index()
    {
        $proveedores = Proveedor::with('condicionIva')->get(); 
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        $condiciones = Condicion::all();
        return view('proveedores.create', compact('condiciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'razon_social' => 'required|string|max:250',
            'cuit' => 'required|string|max:250|unique:proveedores,cuit',
            'telefono_contacto' => 'nullable|string|max:250',
            'email' => 'nullable|email|max:250|unique:proveedores,email', 
            'persona_contacto' => 'nullable|string|max:250', 
            'rela_condicioniva' => 'required|exists:condicion,id_condicioniva',
        ]);

        Proveedor::create([
            'razon_social' => $request->razon_social,
            'cuit' => $request->cuit,
            'telefono_contacto' => $request->telefono_contacto,
            'email' => $request->email,
            'persona_contacto' => $request->persona_contacto,
            'rela_condicioniva' => $request->rela_condicioniva,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }


    public function show(Proveedor $proveedor)
    {

        return redirect()->route('proveedores.index'); 
    }

    public function edit(Proveedor $proveedor)
    {
        $condiciones = Condicion::all();
        return view('proveedores.edit', compact('proveedor', 'condiciones'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'razon_social' => 'required|string|max:250',

            'cuit' => 'required|string|max:250|unique:proveedores,cuit,' . $proveedor->id_proveedores . ',id_proveedores',
            'telefono_contacto' => 'nullable|string|max:250',

            'email' => 'nullable|email|max:250|unique:proveedores,email,' . $proveedor->id_proveedores . ',id_proveedores',
            'persona_contacto' => 'nullable|string|max:250',
            'rela_condicioniva' => 'required|exists:condicion,id_condicioniva',
        ]);

        $proveedor->update([
            'razon_social' => $request->razon_social,
            'cuit' => $request->cuit,
            'telefono_contacto' => $request->telefono_contacto,
            'email' => $request->email,
            'persona_contacto' => $request->persona_contacto,
            'rela_condicioniva' => $request->rela_condicioniva,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        try {
            $proveedor->delete();
            return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('proveedores.index')->with('error', 'No se pudo eliminar el proveedor. Asegúrate de que no esté relacionado con otros registros (ej. productos, compras).');
        }
    }
}