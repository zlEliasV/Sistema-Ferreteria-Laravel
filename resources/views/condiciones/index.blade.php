@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Condiciones IVA</h2>
    <a href="{{ route('condiciones.create') }}" class="btn btn-primary mb-3">Crear Nueva Condición IVA</a>

    @if ($condiciones->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay condiciones IVA registradas.
        </div>
    @else
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($condiciones as $condicion)
                    <tr>
                        <td>{{ $condicion->id_condicioniva }}</td>
                        <td>{{ $condicion->descripcion }}</td>
                        <td>

                                <a href="{{ route('condiciones.edit', $condicion) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('condiciones.destroy', $condicion) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta condición?')" title="Eliminar">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection