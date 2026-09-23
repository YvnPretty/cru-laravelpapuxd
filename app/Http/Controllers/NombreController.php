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
        return view('index', ['nombres' => Nombre::latest()->get()]);
    }

    public function create(): View
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(['nombre' => ['required', 'string', 'max:255']]);
        $nombre = new Nombre;
        $nombre->nombre = $data['nombre'];
        $nombre->save();

        return redirect()->route('nombres.show', $nombre);
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
        $data = $request->validate(['nombre' => ['required', 'string', 'max:255']]);
        $nombre->nombre = $data['nombre'];
        $nombre->save();

        return redirect()->route('nombres.show', $nombre);
    }

    public function destroy(Nombre $nombre): RedirectResponse
    {
        $nombre->delete();

        return redirect()->route('nombres.index');
    }
}
