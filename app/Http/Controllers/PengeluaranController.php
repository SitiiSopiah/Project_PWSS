<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::latest('tanggal')->get();

        return view('pengeluaran.index', compact('pengeluarans'));
    }

    public function create()
    {
        return view('pengeluaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'sumber' => 'required|string|max:255',
            'jumlah_karung' => 'required|integer|min:0',
            'total' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Pengeluaran::create($validated);

        return redirect()
            ->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'sumber' => 'required|string|max:255',
            'jumlah_karung' => 'required|integer|min:0',
            'total' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update($validated);

        return redirect()
            ->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()
            ->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}