<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();

        return view('fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('fasilitas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        Fasilitas::create($validated);

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Data fasilitas berhasil ditambahkan.');
    }

    public function edit(Fasilitas $fasilita)
    {
        return view('fasilitas.edit', compact('fasilita'));
    }

    public function update(Request $request, Fasilitas $fasilita)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $fasilita->update($validated);

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Data fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilita)
    {
        $fasilita->delete();

        return redirect()
            ->route('fasilitas.index')
            ->with('success', 'Data fasilitas berhasil dihapus.');
    }
}