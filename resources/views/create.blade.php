@extends('layouts.main')

@section('content')
    <h1>Crear nombre</h1>
    <form method="post" action="{{ route('nombres.store') }}">
        @csrf
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required maxlength="255">
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('nombres.index') }}">Volver</a>
@endsection
