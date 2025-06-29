<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Condicion;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::with(['provincia', 'condicionIva'])->get();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $provincias = Provincia::all();
        $condiciones = Condicion::all();
        return view('clientes.create', compact('provincias', 'condiciones'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:250',
            'apellido' => 'required|string|max:250',
            'dni' => 'required|string|max:250|unique:clientes,dni', 
            'fechanacimiento' => 'required|date',
            'rela_provincia' => 'required|exists:provincias,id_provincia',
            'localidad' => 'required|string|max:250',
            'direccion' => 'required|string|max:250',
            'cuit' => 'required|string|max:250|unique:clientes,cuit', 
            'email' => 'required|email|max:250|unique:clientes,email', 
            'telefono' => 'required|string|max:250',
            'rela_condicioniva' => 'required|exists:condicion,id_condicioniva',
        ]);

        // Crear un nuevo cliente en la base de datos
        Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'fechanacimiento' => $request->fechanacimiento,
            'rela_provincia' => $request->rela_provincia,
            'localidad' => $request->localidad,
            'direccion' => $request->direccion,
            'cuit' => $request->cuit,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rela_condicioniva' => $request->rela_condicioniva,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }


    public function show(Cliente $cliente)
    {

        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        $provincias = Provincia::all();
        $condiciones = Condicion::all();
        return view('clientes.edit', compact('cliente', 'provincias', 'condiciones'));
    }


    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:250',
            'apellido' => 'required|string|max:250',
            'dni' => 'required|string|max:250|unique:clientes,dni,' . $cliente->id_clientes . ',id_clientes', // DNI único, excluyendo el actual
            'fechanacimiento' => 'required|date',
            'rela_provincia' => 'required|exists:provincias,id_provincia',
            'localidad' => 'required|string|max:250',
            'direccion' => 'required|string|max:250',
            'cuit' => 'required|string|max:250|unique:clientes,cuit,' . $cliente->id_clientes . ',id_clientes', // CUIT único, excluyendo el actual
            'email' => 'required|email|max:250|unique:clientes,email,' . $cliente->id_clientes . ',id_clientes', // Email único, excluyendo el actual
            'telefono' => 'required|string|max:250',
            'rela_condicioniva' => 'required|exists:condicion,id_condicioniva',
        ]);

        // Actualizar el cliente en la base de datos
        $cliente->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'fechanacimiento' => $request->fechanacimiento,
            'rela_provincia' => $request->rela_provincia,
            'localidad' => $request->localidad,
            'direccion' => $request->direccion,
            'cuit' => $request->cuit,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rela_condicioniva' => $request->rela_condicioniva,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
        } catch (\Exception $e) {

            return redirect()->route('clientes.index')->with('error', 'No se pudo eliminar el cliente. Asegúrate de que no esté relacionado con otros registros (ej. ventas).');
        }
    }
}