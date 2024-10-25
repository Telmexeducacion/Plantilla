@extends('layouts.app')

@section('content')
  <a href="{{route('paginas.create')}}"> Crear Nueva Pagina </a> <br>

  <div class="container">
    <h1>Administrar Páginas Publicadas</h1>

    <!-- Tabla para visualizar las páginas -->
    <table id="paginasTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Slug</th>
                <th>Tipo</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paginas as $pagina)
                <tr>
                    <td>{{ $pagina->titulo }}</td>
                    <td>{{ $pagina->slug }}</td>
                    <td>{{ ucfirst($pagina->tipo) }}</td>
                    <td>
                        @if($pagina->estatus === 'publicado')
                            <span class="badge badge-success">Publicado</span>
                        @elseif($pagina->estatus === 'revision')
                            <span class="badge badge-warning">En Revisión</span>
                        @else
                            <span class="badge badge-danger">Baja</span>
                        @endif
                    </td>
                    <td>
                        <!-- Botón de eliminar -->
                        <form action="{{ route('paginas.destroy', $pagina->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta página?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Incluir DataTables JS y CSS desde el CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    // Inicializar DataTables en la tabla
    $(document).ready(function() {
        $('#paginasTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json" // Traducción al español
            }
        });
    });
</script>

@endsection
