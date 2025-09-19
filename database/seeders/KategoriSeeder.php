<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'ATK'],
            ['nama_kategori' => 'Alat Lab'],
            ['nama_kategori' => 'Sparepart'],
            ['nama_kategori' => 'Alat Komputer'],
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}
