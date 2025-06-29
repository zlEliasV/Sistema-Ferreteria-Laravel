@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Provincias</h2>
    <a href="{{ route('provincias.create') }}" class="btn btn-primary mb-3">Crear Nueva Provincia</a>

    @if ($provincias->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay provincias registradas.
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
                @foreach ($provincias as $provincia)
                    <tr>
                        <td>{{ $provincia->id_provincia }}</td>
                        <td>{{ $provincia->descripcion }}</td>
                        <td>

                                <a href="{{ route('provincias.edit', $provincia) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('provincias.destroy', $provincia) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta provincia?')" title="Eliminar">
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