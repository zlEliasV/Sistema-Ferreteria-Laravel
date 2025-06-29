@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Proveedores</h2>
    <hr>
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Crear Nuevo Proveedor</a>

    @if ($proveedores->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay proveedores registrados.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Razón Social</th>
                        <th>CUIT</th>
                        <th>Email</th>
                        <th>Teléfono Contacto</th>
                        <th>Persona Contacto</th>
                        <th>Condición IVA</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->id_proveedores }}</td>
                            <td>{{ $proveedor->razon_social }}</td>
                            <td>{{ $proveedor->cuit }}</td>
                            <td>{{ $proveedor->email }}</td>
                            <td>{{ $proveedor->telefono_contacto }}</td>
                            <td>{{ $proveedor->persona_contacto }}</td>
                            <td>{{ $proveedor->condicionIva->descripcion ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')" title="Eliminar">
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