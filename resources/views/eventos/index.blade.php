@extends('layouts.app')

@section('title', 'Lista de Eventos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #4A2E80;">Lista de Eventos</h2>
        <a href="{{ route('eventos.create') }}" class="btn btn-primary" style="background-color: #9B7FEA; border: none;">+
            Nuevo Evento</a>
    </div>

    <div class="row g-4">
        @forelse($eventos as $evento)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <span
                            class="badge bg-secondary bg-opacity-10 text-secondary px-2 py-1 mb-2">{{ $evento->tipo }}</span>
                        <h5 class="fw-bold" style="color: #4A2E80;">{{ $evento->titulo }}</h5>
                        <p class="text-muted mb-1">{{ $evento->fecha }} · {{ $evento->hora }}</p>
                        <p class="fw-medium mb-2">{{ $evento->lugar }}</p>
                        <p class="mb-0">{{ $evento->descripcion }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-end">
                        <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        <form action="{{ route('eventos.destroy', $evento) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('¿Eliminar evento?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted py-4">No hay eventos registrados aún.</p>
            </div>
        @endforelse
    </div>
    <div class="mt-3">{{ $eventos->links() }}</div>
@endsection
