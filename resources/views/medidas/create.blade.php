@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nueva Medida</h2>
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

    <form action="{{ route('medidas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción de la Medida</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required>
        </div>

        <div class="mb-3">
            <label for="abreviatura" class="form-label">Abreviatura</label>
            <input type="text" class="form-control" id="abreviatura" name="abreviatura" value="{{ old('abreviatura') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Medida</button>
        <a href="{{ route('medidas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection