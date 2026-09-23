@extends('layouts.main')

@section('content')
    <h1>Editar nombre</h1>
    <form method="post" action="{{ route('nombres.update', $nombre) }}">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $nombre->nombre) }}" required maxlength="255">
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('nombres.index') }}">Volver</a>
@endsection
