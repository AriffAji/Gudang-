<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];

    // Relasi ke Barang
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
