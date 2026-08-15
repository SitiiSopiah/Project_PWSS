<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::orderBy('tanggal', 'desc')->get();

        $totalPengeluaran = Pengeluaran::sum('jumlah');

        return view('pengeluarans.index', compact(
            'pengeluarans',
            'totalPengeluaran'
        ));
    }

    public function create()
    {
        return view('pengeluarans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Pengeluaran::create($validated);

        return redirect()
            ->route('pengeluarans.index')
            ->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluarans.edit', compact('pengeluaran'));
    }

    public function update(
        Request $request,
        Pengeluaran $pengeluaran
    ) {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update($validated);

        return redirect()
            ->route('pengeluarans.index')
            ->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()
            ->route('pengeluarans.index')
            ->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}