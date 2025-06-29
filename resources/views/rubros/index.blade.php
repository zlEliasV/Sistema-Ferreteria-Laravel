@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Rubros</h2>
    <hr>
    <a href="{{ route('rubros.create') }}" class="btn btn-primary mb-3">Crear Nuevo Rubro</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($rubros->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay rubros registrados.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rubros as $rubro)
                        <tr>
                            <td>{{ $rubro->id }}</td>
                            <td>{{ $rubro->nombre }}</td>
                            <td>
                                <a href="{{ route('rubros.edit', $rubro->id) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('rubros.destroy', $rubro->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este rubro?')" title="Eliminar">
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