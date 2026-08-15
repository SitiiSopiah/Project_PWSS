<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pencatatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'wilayah_rt',
        'jumlah_karung',
        'total_pemasukan',
        'user_id',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah_karung' => 'integer',
        'total_pemasukan' => 'decimal:2',
    ];

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
