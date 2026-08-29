<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukans = Pemasukan::latest('tanggal')->get();

        return view('administrasi.index', compact('pemasukans'));
    }

    public function create()
    {
        return view('administrasi.pemasukan.create');
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

        Pemasukan::create($validated);

        return redirect()
            ->route('administrasi.index')
            ->with('success', 'Data pemasukan berhasil ditambahkan.');
    }

    public function edit(Pemasukan $pemasukan)
    {
        return view(
            'administrasi.pemasukan.edit',
            compact('pemasukan')
        );
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'sumber' => 'required|string|max:255',
            'jumlah_karung' => 'required|integer|min:0',
            'total' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $pemasukan->update($validated);

        return redirect()
            ->route('administrasi.index')
            ->with('success', 'Data pemasukan berhasil diperbarui.');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()
            ->route('administrasi.index')
            ->with('success', 'Data pemasukan berhasil dihapus.');
    }
}