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

        // Total pemasukan menggunakan kolom total
        $totalPemasukan = Pemasukan::sum('total');

        // Total pengeluaran menggunakan kolom jumlah
        $totalPengeluaran = Pengeluaran::sum('jumlah');

        // Saldo akhir
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