@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Gestión de Horarios</h2>

    <!-- Mensaje de notificación -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <!-- Botón para crear horario nuevo -->
    <div class="mb-3">
        <a href="{{ route('psicologo.horarios.create') }}" class="btn btn-primary">Nuevo Horario</a>
    </div>

    <!-- Tabla con listado de horarios -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Fin</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($horarios as $horario)
                <tr>
                    <td>{{ $horario->dia }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>
                        <span class="badge {{ $horario->estado === 'Disponible' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $horario->estado }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('psicologo.horarios.edit', $horario) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('psicologo.horarios.destroy', $horario) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este horario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Enlaces de paginación -->
    <div class="mt-4">
        {{ $horarios->links() }}
    </div>
</div>
@endsection
