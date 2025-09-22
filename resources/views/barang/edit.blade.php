@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-white mb-4">Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-300">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
                class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500 text-white">
            @error('nama_barang')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-300">Kategori</label>
            <select name="kategori_id"
                class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500 text-white">
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-300">Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}"
                class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500 text-white">
            @error('stok')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-300">Satuan</label>
            <select name="satuan" 
                class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500 text-white" required>
                <option value="">-- Pilih Satuan --</option>
                <option value="Pcs" {{ old('satuan', $barang->satuan) == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                <option value="Box" {{ old('satuan', $barang->satuan) == 'Box' ? 'selected' : '' }}>Box</option>
                <option value="Pack" {{ old('satuan', $barang->satuan) == 'Pack' ? 'selected' : '' }}>Pack</option>
                <option value="Unit" {{ old('satuan', $barang->satuan) == 'Unit' ? 'selected' : '' }}>Unit</option>
                <option value="Lusin" {{ old('satuan', $barang->satuan) == 'Lusin' ? 'selected' : '' }}>Lusin</option>
            </select>

            @error('satuan')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label class="block text-gray-300">Minimum Stok</label>
            <input type="number" name="minimum_stok" value="{{ old('minimum_stok', $barang->minimum_stok) }}"
                class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500 text-white">
            @error('minimum_stok')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </div>
    </form>
</div>
@endsection
