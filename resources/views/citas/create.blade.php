@extends('layouts.app')

@section('title', 'Nueva Cita')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4" style="color: #4A2E80;">Agendar Nueva Cita</h3>

                    <form action="{{ route('citas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-medium">Paciente</label>
                            <input type="text" name="paciente" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Fecha</label>
                                <input type="date" name="fecha" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Hora</label>
                                <input type="time" name="hora" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Psicólogo</label>
                            <select name="psicologo" class="form-select" required>
                                <option value="">Selecciona un psicólogo</option>
                                <option value="Ps. María Gómez">Ps. María Gómez</option>
                                <option value="Dr. Carlos Mendoza">Dr. Carlos Mendoza</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #9B7FEA; border: none;">
                            Guardar Cita
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
