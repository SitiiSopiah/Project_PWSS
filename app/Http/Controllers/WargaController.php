<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = Warga::latest()->get();

        return view('wargas.index', compact('wargas'));
    }

    public function create()
    {
        return view('wargas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'wilayah_rt' => 'required|string|max:20',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Warga::create($validated);

        return redirect()
            ->route('wargas.index')
            ->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(Warga $warga)
    {
        return view('wargas.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'wilayah_rt' => 'required|string|max:20',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $warga->update($validated);

        return redirect()
            ->route('wargas.index')
            ->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()
            ->route('wargas.index')
            ->with('success', 'Data warga berhasil dihapus.');
    }
}