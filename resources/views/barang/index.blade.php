@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <h1>Daftar Barang</h1> -->
    
    <a href="{{ route('barang.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Barang</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    

<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <<tr>
                 <th class="px-6 py-3">Nama</th>
                 <th class="px-6 py-3">Kategori</th>
                 <th class="px-6 py-3">Stok</th>
                 <th class="px-6 py-3">Satuan</th>
                 <th class="px-6 py-3">Minimum</th>
                 <th class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
              @foreach ($barang as $b)
            <tr @if($b->stok <= $b->minimum_stok) style="background:#ffe5e5" @endif>
                 <td class="px-6 py-3">{{ $b->nama_barang }}</td>
                 <td class="px-6 py-3">{{ $b->kategori }}</td>
                 <td class="px-6 py-3">{{ $b->stok }}</td>
                 <td class="px-6 py-3">{{ $b->satuan }}</td>
                 <td class="px-6 py-3">{{ $b->minimum_stok }}</td>
                 <td class="px-6 py-3">
                    <a href="{{ route('barang.edit', $b->id) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


    <!-- <table class="table table-bordered">
        <thead>
            
        </thead>
        <tbody>
            @foreach ($barang as $b)
            <tr @if($b->stok <= $b->minimum_stok) style="background:#ffe5e5" @endif>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->kategori }}</td>
                <td>{{ $b->stok }}</td>
                <td>{{ $b->satuan }}</td>
                <td>{{ $b->minimum_stok }}</td>
                <td>
                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> -->
</div>
@endsection
