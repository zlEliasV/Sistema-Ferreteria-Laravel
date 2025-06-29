@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Rubro</h2>
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

    <form action="{{ route('rubros.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Rubro</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required maxlength="255">
        </div>

        <button type="submit" class="btn btn-success">Guardar Rubro</button>
        <a href="{{ route('rubros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection