@extends('layouts.main')

@section('content')
    <h1>{{ $item->nombre }}</h1>
    <a href="{{ route('nombres.edit', $item) }}">Editar</a>
    <a href="{{ route('nombres.index') }}">Volver</a>
    <form method="post" action="{{ route('nombres.destroy', $item) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
