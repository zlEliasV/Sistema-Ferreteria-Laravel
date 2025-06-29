@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Marca</h2>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('marcas.update', $marca->id_marcas) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="marcas_descripcion" class="form-label">Descripción de la Marca</label>
            <input type="text" class="form-control" id="marcas_descripcion" name="marcas_descripcion" value="{{ old('marcas_descripcion', $marca->marcas_descripcion) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Marca</button>
        <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection