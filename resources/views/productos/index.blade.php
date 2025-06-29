@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Productos</h2>
    <hr>
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Producto</a>

    @if ($productos->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay productos registrados.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Precio Venta</th>
                        <th>Stock Actual</th>
                        <th>Marca</th>
                        <th>Medida</th>
                        <th>Rubro</th>
                        <th>Precio Compra</th>
                        <th>Porcentaje Utilidad</th>
                        <th>Proveedor</th>
                        <th>Cantidad Mínima</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id_productos }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ number_format($producto->precio_venta, 2, ',', '.') }}</td>
                            <td>{{ $producto->cantidad_actual }}</td>
                            <td>{{ $producto->marca->marcas_descripcion ?? 'N/A' }}</td>
                            <td>{{ $producto->medida->descripcion ?? 'N/A' }}</td>
                            <td>{{ $producto->rubro->nombre ?? 'N/A' }}</td> 
                            <td>{{ number_format($producto->precio_compra, 2, ',', '.') }}</td>
                            <td>{{ $producto->porcentaje_utilidad }}%</td>
                            <td>{{ $producto->proveedor->razon_social ?? 'N/A' }}</td> 
                            <td>{{ $producto->cantidad_minima }}</td>
                            <td>
                                <a href="{{ route('productos.edit', $producto->id_productos) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('productos.destroy', $producto->id_productos) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')" title="Eliminar">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection