<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    protected $fillable = ['barang_id', 'jumlah', 'penerima', 'tujuan', 'tanggal_keluar'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    protected static function booted()
    {
        // Saat barang keluar dibuat, stok otomatis berkurang
        static::created(function ($barangKeluar) {
            $barang = $barangKeluar->barang;
            $barang->stok -= $barangKeluar->jumlah;
            $barang->save();
        });
    }
}

