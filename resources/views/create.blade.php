@extends('layouts.main')

@section('title', 'Crear nombre')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white"><h2 class="h5 mb-0">Crear nombre</h2></div>
        <div class="card-body">
            <form method="POST" action="{{ route('nombres.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ is_scalar(old('nombre')) ? old('nombre') : '' }}" required maxlength="255" @error('nombre') aria-invalid="true" aria-describedby="nombre-error" @enderror>
                    @error('nombre')
                        <div id="nombre-error" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('nombres.index') }}" class="btn btn-secondary">Volver</a>
            </form>
        </div>
    </div>
@endsection
