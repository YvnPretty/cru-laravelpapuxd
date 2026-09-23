@extends('layouts.main')

@section('content')
    <h1>Nombres</h1>
    <a href="{{ route('nombres.create') }}">Crear nombre</a>
    <ul>
        @forelse ($nombres as $nombre)
            <li><a href="{{ route('nombres.show', $nombre) }}">{{ $nombre->nombre }}</a></li>
        @empty
            <li>No hay nombres registrados.</li>
        @endforelse
    </ul>
@endsection
