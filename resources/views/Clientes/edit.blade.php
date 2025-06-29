@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>
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

    <form action="{{ route('clientes.update', $cliente->id_clientes) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" required>
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $cliente->dni) }}" required>
        </div>
        <div class="mb-3">
            <label for="fechanacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" value="{{ old('fechanacimiento', $cliente->fechanacimiento) }}" required>
        </div>
        <div class="mb-3">
            <label for="rela_provincia" class="form-label">Provincia</label>
            <select class="form-select" id="rela_provincia" name="rela_provincia" required>
                <option value="">Seleccione una provincia</option>
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->id_provincia }}" {{ old('rela_provincia', $cliente->rela_provincia) == $provincia->id_provincia ? 'selected' : '' }}>
                        {{ $provincia->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="localidad" class="form-label">Localidad</label>
            <input type="text" class="form-control" id="localidad" name="localidad" value="{{ old('localidad', $cliente->localidad) }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" required>
        </div>
        <div class="mb-3">
            <label for="cuit" class="form-label">CUIT</label>
            <input type="text" class="form-control" id="cuit" name="cuit" value="{{ old('cuit', $cliente->cuit) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" required>
        </div>
        <div class="mb-3">
            <label for="rela_condicioniva" class="form-label">Condición IVA</label>
            <select class="form-select" id="rela_condicioniva" name="rela_condicioniva" required>
                <option value="">Seleccione una condición IVA</option>
                @foreach ($condiciones as $condicion)
                    <option value="{{ $condicion->id_condicioniva }}" {{ old('rela_condicioniva', $cliente->rela_condicioniva) == $condicion->id_condicioniva ? 'selected' : '' }}>
                        {{ $condicion->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection