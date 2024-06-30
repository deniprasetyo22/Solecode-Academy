<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'anggota_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_batas_kembali',
        'tanggal_kembali',
        'denda',
    ];

    public function anggota()
    {
        return $this->belongsTo(User::class, 'anggota_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'peminjaman_id');
    }
}
