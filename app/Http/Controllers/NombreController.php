<?php

namespace App\Http\Controllers;

use App\Models\Nombre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NombreController extends Controller
{
    public function index(): View
    {
        return view('index', ['nombres' => Nombre::orderByDesc('_id')->paginate(10)]);
    }

    public function create(): View
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(['nombre' => ['required', 'string', 'max:255']], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede superar 255 caracteres.',
        ]);
        $nombre = new Nombre;
        $nombre->nombre = $data['nombre'];
        $nombre->save();

        return redirect()->route('nombres.show', $nombre)->with('success', 'Nombre creado exitosamente.');
    }

    public function show(Nombre $nombre): View
    {
        $item = $nombre;

        return view('show', compact('item'));
    }

    public function edit(Nombre $nombre): View
    {
        return view('edit', compact('nombre'));
    }

    public function update(Request $request, Nombre $nombre): RedirectResponse
    {
        $data = $request->validate(['nombre' => ['required', 'string', 'max:255']], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede superar 255 caracteres.',
        ]);
        $nombre->nombre = $data['nombre'];
        $nombre->save();

        return redirect()->route('nombres.show', $nombre)->with('success', 'Nombre actualizado exitosamente.');
    }

    public function destroy(Nombre $nombre): RedirectResponse
    {
        $nombre->delete();

        return redirect()->route('nombres.index')->with('success', 'Nombre eliminado exitosamente.');
    }
}
