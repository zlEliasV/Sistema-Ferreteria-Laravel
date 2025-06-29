@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Clientes</h2>
    <hr>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Cliente</a>

    @if ($clientes->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay clientes registrados.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>DNI</th>
                        <th>CUIT</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Provincia</th>
                        <th>Localidad</th>
                        <th>Dirección</th>
                        <th>Condición IVA</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id_clientes }}</td>
                            <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                            <td>{{ $cliente->dni }}</td>
                            <td>{{ $cliente->cuit }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->provincia->descripcion ?? 'N/A' }}</td>
                            <td>{{ $cliente->localidad }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->condicionIva->descripcion ?? 'N/A' }}</td>
                            <td>
                            
                                <a href="{{ route('clientes.edit', $cliente->id_clientes) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('clientes.destroy', $cliente->id_clientes) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')" title="Eliminar">
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