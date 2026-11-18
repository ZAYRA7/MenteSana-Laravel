@extends('layouts.app')

@section('title', 'Lista de Alumnos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #4A2E80;">Lista de Alumnos</h2>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary" style="background-color: #9B7FEA; border: none;">+
            Nuevo Alumno</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #EEE9FF;">
                        <tr>
                            <th class="ps-4">Matrícula</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Cuatrimestre</th>
                            <th>Último Ánimo</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alumnos as $alumno)
                            <tr>
                                <td class="ps-4 fw-medium">{{ $alumno->matricula }}</td>
                                <td>{{ $alumno->nombre }}</td>
                                <td>{{ $alumno->carrera }}</td>
                                <td>{{ $alumno->cuatrimestre }}</td>

                                <!-- CAMBIO DE COLORES SEGÚN ÚLTIMO ÁNIMO -->
                                <td>
                                    @if ($alumno->ultimo_animo == 'Motivado' || $alumno->ultimo_animo == 'Estable')
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success px-2 py-1">{{ $alumno->ultimo_animo }}</span>
                                    @elseif($alumno->ultimo_animo == 'Ansioso' || $alumno->ultimo_animo == 'Estresado')
                                        <span
                                            class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">{{ $alumno->ultimo_animo }}</span>
                                    @elseif($alumno->ultimo_animo == 'Triste')
                                        <span
                                            class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">{{ $alumno->ultimo_animo }}</span>
                                    @else
                                        <span
                                            class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1">{{ $alumno->ultimo_animo }}</span>
                                    @endif
                                </td>

                                <td class="text-end pe-4">
                                    <a href="{{ route('alumnos.edit', $alumno) }}"
                                        class="btn btn-sm btn-outline-primary">Editar</a>
                                    <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('¿Eliminar alumno?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No hay alumnos registrados aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-3">{{ $alumnos->links() }}</div>
@endsection
