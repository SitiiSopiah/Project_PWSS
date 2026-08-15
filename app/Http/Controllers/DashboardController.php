<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('tanggal', 'desc')->get();

        return view('dashboard.index', compact('kegiatans'));
    }
}