@extends('layouts.app')

@section('title', 'Editar Cita')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4" style="color: #4A2E80;">Editar Cita</h3>

                    <form action="{{ route('citas.update', $cita['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-medium">Paciente</label>
                            <input type="text" name="paciente" class="form-control" value="{{ $cita['paciente'] }}"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="{{ $cita['fecha'] }}"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Hora</label>
                                <input type="time" name="hora" class="form-control" value="{{ $cita['hora'] }}"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Psicólogo</label>
                            <select name="psicologo" class="form-select" required>
                                <option value="Ps. María Gómez"
                                    {{ $cita['psicologo'] == 'Ps. María Gómez' ? 'selected' : '' }}>Ps. María Gómez</option>
                                <option value="Dr. Carlos Mendoza"
                                    {{ $cita['psicologo'] == 'Dr. Carlos Mendoza' ? 'selected' : '' }}>Dr. Carlos Mendoza
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #4A2E80; border: none;">
                            Actualizar Cita
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
