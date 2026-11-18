@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva herramienta</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('herramientas.store') }}" method="POST">
        @csrf

        <div>
            <label for="titulo">Título</label><br>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
        </div>

        <div>
            <label for="tipo">Tipo</label><br>
            <input type="text" id="tipo" name="tipo" value="{{ old('tipo') }}">
        </div>

        <div>
            <label for="enlace">Enlace</label><br>
            <input type="url" id="enlace" name="enlace" value="{{ old('enlace') }}">
        </div>

        <div>
            <label for="descripcion">Descripción</label><br>
            <textarea id="descripcion" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
        </div>

        <button type="submit">Guardar</button>
        <a href="{{ route('herramientas.index') }}">Cancelar</a>
    </form>
</div>
@endsection