@extends('layouts.app')

@section('content')
<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Herramientas</h1>
        <a href="{{ route('herramientas.create') }}">+ Nueva herramienta</a>
    </div>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" style="width:100%; margin-top:15px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Enlace</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($herramientas as $herramienta)
                <tr>
                    <td>{{ $herramienta->id }}</td>
                    <td>{{ $herramienta->titulo }}</td>
                    <td>{{ $herramienta->tipo }}</td>
                    <td><a href="{{ $herramienta->enlace }}" target="_blank">Abrir</a></td>
                    <td>{{ Str::limit($herramienta->descripcion, 60) }}</td>
                    <td>
                        <a href="{{ route('herramientas.edit', $herramienta) }}">Editar</a>
                        <form action="{{ route('herramientas.destroy', $herramienta) }}"
                              method="POST" style="display:inline;"
                              onsubmit="return confirm('¿Eliminar esta herramienta?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No hay herramientas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:15px;">
        {{ $herramientas->links() }}
    </div>
</div>
@endsection