@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Editar Horario</h2>

    <!-- Mensajes de error de validación -->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para actualizar horario -->
    <form action="{{ route('psicologo.horarios.update', $horario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <input type="text" name="dia" id="dia" class="form-control" value="{{ old('dia', $horario->dia) }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio', $horario->hora_inicio) }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de Fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin', $horario->hora_fin) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="Disponible" {{ old('estado', $horario->estado) === 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="No disponible" {{ old('estado', $horario->estado) === 'No disponible' ? 'selected' : '' }}>No disponible</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('psicologo.horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
