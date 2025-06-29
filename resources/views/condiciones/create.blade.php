@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nueva Condición IVA</h2>
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

    <form action="{{ route('condiciones.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Condición IVA</button>
        <a href="{{ route('condiciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection