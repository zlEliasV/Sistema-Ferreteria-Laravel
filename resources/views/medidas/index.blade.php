@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Listado de Medidas</h2>
    <hr>
    <a href="{{ route('medidas.create') }}" class="btn btn-primary mb-3">Crear Nueva Medida</a>

    @if ($medidas->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay medidas registradas.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Abreviatura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medidas as $medida)
                        <tr>
                            <td>{{ $medida->id_medida }}</td>
                            <td>{{ $medida->descripcion }}</td>
                            <td>{{ $medida->abreviatura }}</td>
                            <td>

                                <a href="{{ route('medidas.edit', $medida) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('medidas.destroy', $medida) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta medida?')" title="Eliminar">
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