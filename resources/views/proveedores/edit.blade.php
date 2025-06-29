@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Editar Proveedor</h2>
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

    <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Campos para Proveedor --}}
        <div class="mb-3">
            <label for="razon_social" class="form-label">Razón Social</label>
            <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social', $proveedor->razon_social) }}" required>
        </div>
        <div class="mb-3">
            <label for="cuit" class="form-label">CUIT</label>
            <input type="text" class="form-control" id="cuit" name="cuit" value="{{ old('cuit', $proveedor->cuit) }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono_contacto" class="form-label">Teléfono Contacto (opcional)</label>
            <input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto" value="{{ old('telefono_contacto', $proveedor->telefono_contacto) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email (opcional)</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $proveedor->email) }}">
        </div>
        <div class="mb-3">
            <label for="persona_contacto" class="form-label">Persona de Contacto (opcional)</label>
            <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" value="{{ old('persona_contacto', $proveedor->persona_contacto) }}">
        </div>
        <div class="mb-3">
            <label for="rela_condicioniva" class="form-label">Condición IVA</label>
            <select class="form-select" id="rela_condicioniva" name="rela_condicioniva" required>
                <option value="">Seleccione una condición IVA</option>
                @foreach ($condiciones as $condicion)
                    <option value="{{ $condicion->id_condicioniva }}" {{ old('rela_condicioniva', $proveedor->rela_condicioniva) == $condicion->id_condicioniva ? 'selected' : '' }}>
                        {{ $condicion->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Proveedor</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection