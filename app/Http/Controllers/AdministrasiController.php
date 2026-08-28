<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class AdministrasiController extends Controller
{
    public function index()
    {
        $pemasukans = Pemasukan::latest('tanggal')->get();
        $pengeluarans = Pengeluaran::latest('tanggal')->get();
        $totalPemasukan = Pemasukan::sum('total');
        $totalPengeluaran = Pengeluaran::sum('total');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        return view('administrasi.index', compact(
            'pemasukans',
            'pengeluarans',
            'totalPemasukan',
            'totalPengeluaran',
            'saldoAkhir'
        ));
    }
}