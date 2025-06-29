<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Rubro; 
use App\Models\Proveedor; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['marca', 'medida', 'rubro', 'proveedor'])->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $medidas = Medida::all();
        $rubros = Rubro::all(); 
        $proveedores = Proveedor::all(); 
        return view('productos.create', compact('marcas', 'medidas', 'rubros', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:20',
            'precio_venta' => 'required|numeric|min:0',
            'cantidad_actual' => 'required|integer|min:0',
            'rela_marcas' => 'required|exists:marcas,id_marcas',
            'rela_medidas' => 'required|exists:medidas,id_medida',
            'rela_rubro' => 'required|exists:rubros,id', 
            'precio_compra' => 'required|numeric|min:0',
            'porcentaje_utilidad' => 'required|integer|min:0',
            'rela_proveedor' => 'required|exists:proveedores,id_proveedores', 
            'cantidad_minima' => 'required|integer|min:0',
        ]);

        Producto::create([
            'descripcion' => $request->descripcion,
            'precio_venta' => $request->precio_venta,
            'cantidad_actual' => $request->cantidad_actual,
            'rela_marcas' => $request->rela_marcas,
            'rela_medidas' => $request->rela_medidas,
            'rela_rubro' => $request->rela_rubro,
            'precio_compra' => $request->precio_compra,
            'porcentaje_utilidad' => $request->porcentaje_utilidad,
            'rela_proveedor' => $request->rela_proveedor,
            'cantidad_minima' => $request->cantidad_minima,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $marcas = Marca::all();
        $medidas = Medida::all();
        $rubros = Rubro::all(); 
        $proveedores = Proveedor::all(); 
        return view('productos.edit', compact('producto', 'marcas', 'medidas', 'rubros', 'proveedores'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'descripcion' => 'required|string|max:20',
            'precio_venta' => 'required|numeric|min:0',
            'cantidad_actual' => 'required|integer|min:0',
            'rela_marcas' => 'required|exists:marcas,id_marcas',
            'rela_medidas' => 'required|exists:medidas,id_medida',
            'rela_rubro' => 'required|exists:rubros,id', 
            'precio_compra' => 'required|numeric|min:0',
            'porcentaje_utilidad' => 'required|integer|min:0',
            'rela_proveedor' => 'required|exists:proveedores,id_proveedores', 
            'cantidad_minima' => 'required|integer|min:0',
        ]);

        $producto->update([
            'descripcion' => $request->descripcion,
            'precio_venta' => $request->precio_venta,
            'cantidad_actual' => $request->cantidad_actual,
            'rela_marcas' => $request->rela_marcas,
            'rela_medidas' => $request->rela_medidas,
            'rela_rubro' => $request->rela_rubro,
            'precio_compra' => $request->precio_compra,
            'porcentaje_utilidad' => $request->porcentaje_utilidad,
            'rela_proveedor' => $request->rela_proveedor,
            'cantidad_minima' => $request->cantidad_minima,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}