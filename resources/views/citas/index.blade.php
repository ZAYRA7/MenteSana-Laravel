@extends('layouts.app')

@section('title', 'Lista de Citas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #4A2E80;">Lista de Citas</h2>
        <a href="{{ route('citas.create') }}" class="btn btn-primary" style="background-color: #9B7FEA; border: none;">
            + Nueva Cita
        </a>
    </div>

    {{-- Mensaje de éxito que viene del controlador --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #EEE9FF;">
                        <tr>
                            <th class="ps-4">Paciente</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Psicólogo</th>
                            <th>Estado</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Recorremos el arreglo $citas que envía el Controlador --}}
                        @foreach ($citas as $cita)
                            <tr>
                                <td class="ps-4 fw-medium">{{ $cita['paciente'] }}</td>
                                <td>{{ $cita['fecha'] }}</td>
                                <td>{{ $cita['hora'] }}</td>
                                <td>{{ $cita['psicologo'] }}</td>
                                <td>
                                    @if ($cita['estado'] == 'Confirmada')
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success px-2 py-1">Confirmada</span>
                                    @elseif($cita['estado'] == 'Pendiente')
                                        <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">Pendiente</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">Cancelada</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('citas.edit', $cita['id']) }}"
                                        class="btn btn-sm btn-outline-primary">Editar</a>

                                    {{-- Formulario para eliminar (Método DELETE) --}}
                                    <form action="{{ route('citas.destroy', $cita['id']) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('¿Seguro que quieres eliminar esta cita?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
