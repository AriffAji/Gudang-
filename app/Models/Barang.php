<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'satuan',
        'stok',
        'minimum_stok'
    ];

    // Relasi ke barang masuk
    public function masuk()
    {
        return $this->hasMany(BarangMasuk::class, 'barang_id');
    }

    // Relasi ke barang keluar
    public function keluar()
    {
        return $this->hasMany(BarangKeluar::class, 'barang_id');
    }

    // Kalau mau hitung stok real-time (opsional, kalau stok tidak langsung dikurang manual)
    public function getStokAttribute($value)
    {
        return $value ?? 0;
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

}
