@extends('layouts.app')

@section('title', 'Editar Evento')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4" style="color: #4A2E80;">Editar Evento</h3>
                    <form action="{{ route('eventos.update', $evento) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                                value="{{ old('titulo', $evento->titulo) }}">
                            @error('titulo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="date" name="fecha"
                                    class="form-control @error('fecha') is-invalid @enderror"
                                    value="{{ old('fecha', $evento->fecha) }}">
                                @error('fecha')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hora</label>
                                <input type="time" name="hora"
                                    class="form-control @error('hora') is-invalid @enderror"
                                    value="{{ old('hora', $evento->hora) }}">
                                @error('hora')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lugar</label>
                            <input type="text" name="lugar" class="form-control @error('lugar') is-invalid @enderror"
                                value="{{ old('lugar', $evento->lugar) }}">
                            @error('lugar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror"
                                value="{{ old('tipo', $evento->tipo) }}">
                            @error('tipo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" rows="3" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $evento->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #4A2E80; border: none;">Actualizar Evento</button>
                        <a href="{{ route('eventos.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
