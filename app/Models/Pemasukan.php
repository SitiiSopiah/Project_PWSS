<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jumlah',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'integer'
    ];
}
