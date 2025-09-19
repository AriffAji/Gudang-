@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-gray-800 p-6 rounded-lg shadow-md text-white">
    <h2 class="text-2xl font-bold mb-6">Tambah Barang</h2>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Barang</label>
            <input type="text" name="nama" class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Kategori</label>
            <!-- <input type="text" name="kategori" class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500" required> -->
            <select name="kategori_id" class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Stok</label>
            <input type="number" name="stok" class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Satuan</label>
            <input type="text" name="satuan" class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Minimum</label>
            <input type="number" name="minimum" class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('barang.index') }}" class="px-4 py-2 rounded bg-gray-500 hover:bg-gray-600">Batal</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
