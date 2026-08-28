<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Models\Petugas;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('petugas')
            ->latest('tanggal')
            ->get();

        return view('jadwals.index', compact('jadwals'));
    }

    public function create()
    {
        $petugas = Petugas::orderBy('nama')->get();

        return view('jadwals.create', compact('petugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'wilayah_rt' => 'required|string|max:20',
            'petugas' => 'required|array|min:1',
            'petugas.*' => 'exists:petugas,id',
        ]);

        $jadwal = Jadwal::create([
            'tanggal' => $validated['tanggal'],
            'wilayah_rt' => $validated['wilayah_rt'],
        ]);

        $jadwal->petugas()->sync($validated['petugas']);

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal pemungutan berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $petugas = Petugas::orderBy('nama')->get();

        return view('jadwals.edit', compact('jadwal', 'petugas'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'petugas_id' => 'required|exists:petugas,id',
            'wilayah_rt' => 'required|string|max:20',
        ]);

        $jadwal->update($validated);

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal pemungutan berhasil diperbarui.');
    }
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}