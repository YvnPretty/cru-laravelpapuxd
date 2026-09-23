@extends('layouts.main')

@section('title', 'Lista de nombres')

@section('content')
    <a href="{{ route('nombres.create') }}" class="btn btn-primary mb-3">Crear nombre</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr><th scope="col">ID</th><th scope="col">Nombre</th><th scope="col">Acciones</th></tr>
            </thead>
            <tbody>
                @forelse ($nombres as $nombre)
                    <tr>
                        <td>{{ $nombre->id }}</td>
                        <td>{{ $nombre->nombre }}</td>
                        <td class="acciones">
                            <a href="{{ route('nombres.show', $nombre) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('nombres.edit', $nombre) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('nombres.destroy', $nombre) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este nombre?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No hay nombres registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">{{ $nombres->links() }}</div>
@endsection
