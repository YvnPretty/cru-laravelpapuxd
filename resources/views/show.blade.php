@extends('layouts.main')

@section('title', 'Detalle del nombre')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-info"><h2 class="h5 mb-0">Detalle del nombre</h2></div>
        <div class="card-body">
            <h3 class="card-title h4 text-primary">{{ $item->nombre }}</h3>
            <p class="text-muted">ID: {{ $item->id }}</p>
            <a href="{{ route('nombres.edit', $item) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('nombres.index') }}" class="btn btn-secondary">Volver</a>
            <form method="POST" action="{{ route('nombres.destroy', $item) }}" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este nombre?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
@endsection
