@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Rubro</h2>
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

    <form action="{{ route('rubros.update', $rubro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Rubro</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $rubro->nombre) }}" required maxlength="255">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Rubro</button>
        <a href="{{ route('rubros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection