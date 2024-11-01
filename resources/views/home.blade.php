@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <!-- Sección de tarjetas o paneles de administración -->
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Publicaciones</h5>
                    </div>
                    <p class="card-text">Gestión de publicaciones y artículos recientes.</p>
                    <a href="{{ url('posts') }}" class="btn btn-light">Ver más</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Usuarios</h5>
                    </div>
                    <p class="card-text">Administrar los usuarios registrados en el sistema.</p>
                    <a href="{{ url('users') }}" class="btn btn-light">Ver más</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Configuraciones</h5>
                    </div>
                    <p class="card-text">Ajustes generales y configuraciones del sistema.</p>
                    <a href="{{ url('settings') }}" class="btn btn-light">Ver más</a>
                </div>
            </div>
        </div>
    </div>
@endsection
