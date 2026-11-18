@extends('layouts.app')

@section('title', 'Registrar Alumno')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4" style="color: #4A2E80;">Registrar Nuevo Alumno</h3>
                    <form action="{{ route('alumnos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Matrícula</label>
                            <input type="text" name="matricula"
                                class="form-control @error('matricula') is-invalid @enderror"
                                value="{{ old('matricula') }}">
                            @error('matricula')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                value="{{ old('nombre') }}">
                            @error('nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Carrera</label>
                                <input type="text" name="carrera"
                                    class="form-control @error('carrera') is-invalid @enderror"
                                    value="{{ old('carrera') }}">
                                @error('carrera')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Cuatrimestre</label>
                                <input type="text" name="cuatrimestre"
                                    class="form-control @error('cuatrimestre') is-invalid @enderror"
                                    value="{{ old('cuatrimestre') }}">
                                @error('cuatrimestre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Último Ánimo</label>
                            <select name="ultimo_animo" class="form-select @error('ultimo_animo') is-invalid @enderror">
                                <option value="">Selecciona un estado de ánimo...</option>
                                <option value="Estable" {{ old('ultimo_animo') == 'Estable' ? 'selected' : '' }}>Estable
                                </option>
                                <option value="Ansioso" {{ old('ultimo_animo') == 'Ansioso' ? 'selected' : '' }}>Ansioso
                                </option>
                                <option value="Estresado" {{ old('ultimo_animo') == 'Estresado' ? 'selected' : '' }}>
                                    Estresado</option>
                                <option value="Triste" {{ old('ultimo_animo') == 'Triste' ? 'selected' : '' }}>Triste
                                </option>
                                <option value="Motivado" {{ old('ultimo_animo') == 'Motivado' ? 'selected' : '' }}>Motivado
                                </option>
                            </select>
                            @error('ultimo_animo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #9B7FEA; border: none;">Guardar Alumno</button>
                        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
