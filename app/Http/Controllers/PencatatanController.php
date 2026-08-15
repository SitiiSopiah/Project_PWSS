<?php

namespace App\Http\Controllers;

use App\Models\Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PencatatanController extends Controller
{
    public function index()
    {
        $pencatatans = Pencatatan::with('user')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('pencatatans.index', compact('pencatatans'));
    }

    public function create()
    {
        return view('pencatatans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'wilayah_rt' => 'required|string|max:20',
            'jumlah_karung' => 'required|integer|min:0',
            'total_pemasukan' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        Pencatatan::create($validated);

        return redirect()
            ->route('pencatatans.index')
            ->with('success', 'Data pencatatan berhasil ditambahkan.');
    }

    public function edit(Pencatatan $pencatatan)
    {
        return view('pencatatans.edit', compact('pencatatan'));
    }

    public function update(
        Request $request,
        Pencatatan $pencatatan
    ) {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'wilayah_rt' => 'required|string|max:20',
            'jumlah_karung' => 'required|integer|min:0',
            'total_pemasukan' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $pencatatan->update($validated);

        return redirect()
            ->route('pencatatans.index')
            ->with('success', 'Data pencatatan berhasil diperbarui.');
    }

    public function destroy(Pencatatan $pencatatan)
    {
        $pencatatan->delete();

        return redirect()
            ->route('pencatatans.index')
            ->with('success', 'Data pencatatan berhasil dihapus.');
    }
}