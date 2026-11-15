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
                        <label class="form-label">Paciente</label>
                        <input type="text" name="paciente" class="form-control @error('paciente') is-invalid @enderror" value="{{ old('paciente') }}">
                        @error('paciente') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}">
                            @error('fecha') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="hora" class="form-control @error('hora') is-invalid @enderror" value="{{ old('hora') }}">
                            @error('hora') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Psicólogo</label>
                        <input type="text" name="psicologo" class="form-control @error('psicologo') is-invalid @enderror" value="{{ old('psicologo') }}">
                        @error('psicologo') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                            <option value="Pendiente" {{ old('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Confirmada" {{ old('estado') == 'Confirmada' ? 'selected' : '' }}>Confirmada</option>
                            <option value="Cancelada" {{ old('estado') == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                        @error('estado') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100" style="background-color: #9B7FEA; border: none;">Guardar Cita</button>
                    <a href="{{ route('citas.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection