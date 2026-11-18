@extends('layouts.app')

@section('title', 'Nuevo Evento')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4" style="color: #4A2E80;">Agendar Nuevo Evento</h3>
                    <form action="{{ route('eventos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                                value="{{ old('titulo') }}">
                            @error('titulo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha</label>
                                <input type="date" name="fecha"
                                    class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}">
                                @error('fecha')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hora</label>
                                <input type="time" name="hora"
                                    class="form-control @error('hora') is-invalid @enderror" value="{{ old('hora') }}">
                                @error('hora')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lugar</label>
                            <input type="text" name="lugar" class="form-control @error('lugar') is-invalid @enderror"
                                value="{{ old('lugar') }}">
                            @error('lugar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror"
                                value="{{ old('tipo') }}">
                            @error('tipo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" rows="3" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #9B7FEA; border: none;">Guardar Evento</button>
                        <a href="{{ route('eventos.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
