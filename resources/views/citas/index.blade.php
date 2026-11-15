@extends('layouts.app')

@section('title', 'Lista de Citas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold" style="color: #4A2E80;">Lista de Citas</h2>
    <a href="{{ route('citas.create') }}" class="btn btn-primary" style="background-color: #9B7FEA; border: none;">+ Nueva Cita</a>
</div>

@if(session('success'))
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
                    @foreach($citas as $cita)
                    <tr>
                        <td class="ps-4 fw-medium">{{ $cita->paciente }}</td>
                        <td>{{ $cita->fecha }}</td>
                        
                        <!-- FORMATO DE 12 HORAS CON AM/PM -->
                        <td>{{ \Carbon\Carbon::parse($cita->hora)->format('h:i A') }}</td>
                        
                        <td>{{ $cita->psicologo }}</td>
                        
                        <!-- CAMBIO DE COLORES SEGÚN ESTADO -->
                        <td>
                            @if($cita->estado == 'Confirmada')
                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Confirmada</span>
                            @elseif($cita->estado == 'Pendiente')
                                <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1">Pendiente</span>
                            @elseif($cita->estado == 'Cancelada')
                                <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">Cancelada</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1">{{ $cita->estado }}</span>
                            @endif
                        </td>

                        <td class="text-end pe-4">
                            <a href="{{ route('citas.edit', $cita) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form action="{{ route('citas.destroy', $cita) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar cita?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $citas->links() }}</div>
@endsection