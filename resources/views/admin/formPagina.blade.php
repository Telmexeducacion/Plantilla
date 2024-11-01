@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Página / Post</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear la página -->
    <form action="{{ route('paginas.store') }}" method="POST" id="paginaForm">
        @csrf

        <!-- Título y Slug en dos columnas -->
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="slug">Slug (se generará automáticamente)</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}" readonly>
                </div>
            </div>
        </div>

        <!-- Contenido (Editor WYSIWYG) a pantalla completa -->
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea name="contenido" class="form-control" id="contenido" rows="10" required>{{ old('contenido') }}</textarea>
        </div>

        <!-- Extracto -->
        <div class="form-group">
            <label for="extracto">Extracto (Opcional)</label>
            <textarea name="extracto" class="form-control" id="extracto" rows="3">{{ old('extracto') }}</textarea>
        </div>

        <!-- Tipo y Estatus en la misma línea -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-control" id="tipo" required>
                        <option value="post" {{ old('tipo') == 'post' ? 'selected' : '' }}>Post</option>
                        <option value="pagina" {{ old('tipo') == 'pagina' ? 'selected' : '' }}>Página</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estatus">Estatus</label>
                    <select name="estatus" class="form-control" id="estatus" required>
                        <option value="publicado" {{ old('estatus') == 'publicado' ? 'selected' : '' }}>Publicado</option>
                        <option value="revision" {{ old('estatus') == 'revision' ? 'selected' : '' }}>En Revisión</option>
                        <option value="baja" {{ old('estatus') == 'baja' ? 'selected' : '' }}>Baja</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botón de envío centrado -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Crear Página</button>
        </div>
    </form>
</div>

<!-- Incluir CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    // Inicializar CKEditor en el textarea del contenido
    CKEDITOR.replace('contenido');

    // Generar slug automáticamente a partir del título
    document.getElementById('titulo').addEventListener('input', function() {
        let titulo = this.value;
        let slug = titulo.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });
</script>

<!-- Estilo personalizado para maximizar el espacio -->
<style>
    .form-group {
        margin-bottom: 15px; /* Reducir el espacio entre campos */
    }
    .container {
        max-width: 100%; /* Maximizar el contenedor */
    }
    .row {
        margin-bottom: 10px; /* Reducir espacio entre filas */
    }
    .btn {
        width: 100%; /* Hacer que el botón ocupe todo el ancho */
    }
</style>
@endsection
