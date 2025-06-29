@extends('layouts.app') 

@section('content')
<div class="container">
    <h2>Listado de Marcas</h2>
    <hr>
    <a href="{{ route('marcas.create') }}" class="btn btn-primary mb-3">Crear Nueva Marca</a>

    @if ($marcas->isEmpty())
        <div class="alert alert-warning" role="alert">
            No hay marcas registradas.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td>{{ $marca->id_marcas }}</td>
                            <td>{{ $marca->marcas_descripcion }}</td> 
                            <td>

                                <a href="{{ route('marcas.edit', $marca->id_marcas) }}" class="btn btn-warning btn-sm my-1" title="Editar">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('marcas.destroy', $marca->id_marcas) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta marca?')" title="Eliminar">
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