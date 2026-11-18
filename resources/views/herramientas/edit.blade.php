@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar herramienta</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('herramientas.update', $herramienta) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título</label><br>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $herramienta->titulo) }}">
        </div>

        <div>
            <label for="tipo">Tipo</label><br>
            <input type="text" id="tipo" name="tipo" value="{{ old('tipo', $herramienta->tipo) }}">
        </div>

        <div>
            <label for="enlace">Enlace</label><br>
            <input type="url" id="enlace" name="enlace" value="{{ old('enlace', $herramienta->enlace) }}">
        </div>

        <div>
            <label for="descripcion">Descripción</label><br>
            <textarea id="descripcion" name="descripcion" rows="4">{{ old('descripcion', $herramienta->descripcion) }}</textarea>
        </div>

        <button type="submit">Actualizar</button>
        <a href="{{ route('herramientas.index') }}">Cancelar</a>
    </form>
</div>
@endsection