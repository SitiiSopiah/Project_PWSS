<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukans = Pemasukan::orderBy('tanggal', 'desc')->get();

        $totalPemasukan = Pemasukan::sum('jumlah');

        return view('pemasukans.index', compact(
            'pemasukans',
            'totalPemasukan'
        ));
    }

    public function create()
    {
        return view('pemasukans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Pemasukan::create($validated);

        return redirect()
            ->route('pemasukans.index')
            ->with('success', 'Data pemasukan berhasil ditambahkan.');
    }

    public function edit(Pemasukan $pemasukan)
    {
        return view('pemasukans.edit', compact('pemasukan'));
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $pemasukan->update($validated);

        return redirect()
            ->route('pemasukans.index')
            ->with('success', 'Data pemasukan berhasil diperbarui.');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()
            ->route('pemasukans.index')
            ->with('success', 'Data pemasukan berhasil dihapus.');
    }
}