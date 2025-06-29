@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Medida</h2>
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

    <form action="{{ route('medidas.update', $medida) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción de la Medida</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $medida->descripcion) }}" required>
        </div>

        <div class="mb-3">
            <label for="abreviatura" class="form-label">Abreviatura (opcional)</label>
            <input type="text" class="form-control" id="abreviatura" name="abreviatura" value="{{ old('abreviatura', $medida->abreviatura) }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Medida</button>
        <a href="{{ route('medidas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection