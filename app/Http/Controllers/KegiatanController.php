<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Menampilkan semua kegiatan
     */
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('tanggal', 'desc')->get();

        return view('kegiatans.index', compact('kegiatans'));
    }


    /**
     * Form tambah kegiatan
     */
    public function create()
    {
        return view('kegiatans.create');
    }


    /**
     * Menyimpan kegiatan
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {

            $validated['foto'] =
                $request->file('foto')->store('kegiatan', 'public');

        }

        Kegiatan::create($validated);

        return redirect()
            ->route('kegiatans.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }


    /**
     * Form edit kegiatan
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatans.edit', compact('kegiatan'));
    }


    /**
     * Update kegiatan
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'nullable|string',
        ]);


        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($kegiatan->foto) {
                Storage::disk('public')->delete($kegiatan->foto);
            }

            // Simpan foto baru
            $validated['foto'] =
                $request->file('foto')->store('kegiatan', 'public');
        }


        $kegiatan->update($validated);

        return redirect()
            ->route('kegiatans.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }


    /**
     * Hapus kegiatan
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->foto) {
            Storage::disk('public')->delete($kegiatan->foto);
        }

        $kegiatan->delete();

        return redirect()
            ->route('kegiatans.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}