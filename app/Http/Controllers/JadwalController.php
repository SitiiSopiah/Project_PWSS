<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Petugas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Menampilkan semua jadwal
     */
    public function index()
    {
        $jadwals = Jadwal::with('petugas')
            ->latest('tanggal')
            ->get();

        return view('jadwals.index', compact('jadwals'));
    }


    /**
     * Form tambah jadwal
     */
    public function create()
    {
        $petugas = Petugas::where('status', 'Aktif')
            ->orderBy('nama')
            ->get();

        return view('jadwals.create', compact('petugas'));
    }


    /**
     * Menyimpan jadwal
     */
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

        // Simpan beberapa petugas
        $jadwal->petugas()->sync($validated['petugas']);

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal pemungutan berhasil ditambahkan.');
    }


    /**
     * Form edit jadwal
     */
    public function edit(Jadwal $jadwal)
    {
        // Ambil semua petugas
        $petugas = Petugas::where('status', 'Aktif')
            ->orderBy('nama')
            ->get();

        // Ambil petugas yang sudah terhubung dengan jadwal
        $jadwal->load('petugas');

        return view('jadwals.edit', compact('jadwal', 'petugas'));
    }


    /**
     * Memperbarui jadwal
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'wilayah_rt' => 'required|string|max:20',

            'petugas' => 'required|array|min:1',
            'petugas.*' => 'exists:petugas,id',
        ]);

        $jadwal->update([
            'tanggal' => $validated['tanggal'],
            'wilayah_rt' => $validated['wilayah_rt'],
        ]);

        // Simpan semua petugas yang dipilih
        $jadwal->petugas()->sync($validated['petugas']);

        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal pemungutan berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal
     */
    public function destroy(Jadwal $jadwal)
    {
        // Hapus relasi petugas
        $jadwal->petugas()->detach();

        // Hapus jadwal
        $jadwal->delete();


        return redirect()
            ->route('jadwals.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}