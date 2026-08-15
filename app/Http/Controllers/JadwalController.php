<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::orderBy('tanggal', 'desc')->get();

        return view('jadwals.index', compact('jadwals'));

    }

    public function create()
    {
        return view('jadwals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'petugas' => 'required|string|max:255',
            'wilayah_rt' => 'required|string|max:20',
        ]);

        Jadwal::create($validated);

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        return view('jadwals.edit', compact('jadwal'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'petugas' => 'required|string|max:255',
            'wilayah_rt' => 'required|string|max:20',
        ]);

        $jadwal->update($validated);

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}