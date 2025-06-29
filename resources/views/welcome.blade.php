@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenido al Sistema de Gestión de Ferretería</h1>
        <p class="col-md-8 fs-4">Utiliza el menú de navegación para gestionar clientes, proveedores, productos y otros datos relacionados.</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="{{ route('clientes.index') }}" role="button">Ir a Clientes</a>
    </div>
</div>
@endsection