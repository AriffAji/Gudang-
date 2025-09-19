<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $fillable = ['barang_id', 'jumlah', 'sumber', 'tanggal_masuk'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    protected static function booted()
    {
        static::created(function ($barangMasuk) {
            $barang = $barangMasuk->barang;
            $barang->stok += $barangMasuk->jumlah;
            $barang->save();
        });
    }
}
