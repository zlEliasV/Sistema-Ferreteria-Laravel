@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Producto</h2>
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

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required maxlength="20">
        </div>
        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio Venta</label>
            <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="{{ old('precio_venta') }}" required>
        </div>
        <div class="mb-3">
            <label for="cantidad_actual" class="form-label">Stock / Cantidad Actual</label>
            <input type="number" class="form-control" id="cantidad_actual" name="cantidad_actual" value="{{ old('cantidad_actual') }}" required>
        </div>
        <div class="mb-3">
            <label for="rela_marcas" class="form-label">Marca</label>
            <select class="form-select" id="rela_marcas" name="rela_marcas" required>
                <option value="">Seleccione una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id_marcas }}" {{ old('rela_marcas') == $marca->id_marcas ? 'selected' : '' }}>
                        {{ $marca->marcas_descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="rela_medidas" class="form-label">Medida</label>
            <select class="form-select" id="rela_medidas" name="rela_medidas" required>
                <option value="">Seleccione una medida</option>
                @foreach ($medidas as $medida)
                    <option value="{{ $medida->id_medida }}" {{ old('rela_medidas') == $medida->id_medida ? 'selected' : '' }}>
                        {{ $medida->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="rela_rubro" class="form-label">Rubro</label>
            <select name="rela_rubro" id="rela_rubro" class="form-select" required>
                <option value="">Seleccione un rubro</option>
                @foreach($rubros as $rubro)
                    <option value="{{ $rubro->id }}" {{ old('rela_rubro') == $rubro->id ? 'selected' : '' }}>{{ $rubro->nombre ?? $rubro->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio Compra</label>
            <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" value="{{ old('precio_compra') }}" required>
        </div>
        <div class="mb-3">
            <label for="porcentaje_utilidad" class="form-label">Porcentaje Utilidad</label>
            <input type="number" class="form-control" id="porcentaje_utilidad" name="porcentaje_utilidad" value="{{ old('porcentaje_utilidad') }}" required>
        </div>
        <div class="mb-3">
            <label for="rela_proveedor" class="form-label">Proveedor</label>
            <select name="rela_proveedor" id="rela_proveedor" class="form-select" required>
                <option value="">Seleccione un proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedores }}" {{ old('rela_proveedor') == $proveedor->id_proveedores ? 'selected' : '' }}>{{ $proveedor->razon_social ?? $proveedor->id_proveedores }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad_minima" class="form-label">Cantidad Mínima</label>
            <input type="number" class="form-control" id="cantidad_minima" name="cantidad_minima" value="{{ old('cantidad_minima') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Producto</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection