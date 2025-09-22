@extends('layouts.app')

@section('content')
    <div class="container">
    <!-- <h1>Daftar Barang</h1> -->
    
        <div class="flex justify-between items-center mb-4">
        <a href="{{ route('barang.create') }}" 
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Tambah Barang
        </a>

        <form method="GET" action="{{ route('barang.index') }}" class="flex">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari barang..."
                class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:ring focus:ring-blue-500 text-white">
            <button type="submit"
                class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Cari
            </button>
        </form>
    </div>

    @if (session('success'))
        <div id="success-alert" 
            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" 
            role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>

        <script>
            // Auto close alert setelah 10 detik (10000 ms)
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500); // remove setelah animasi
                }
            }, 10000);
        </script>
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
            <!-- <tbody>
                @foreach ($barang as $b)
                <tr @if($b->stok <= $b->minimum_stok) style="background:#ffe5e5" @endif>
                    <td class="px-6 py-3">{{ $b->nama_barang }}</td>
                    <td class="px-6 py-3">{{ $b->kategori }}</td>
                    <td class="px-6 py-3">{{ $b->stok }}</td>
                    <td class="px-6 py-3">{{ $b->satuan }}</td>
                    <td class="px-6 py-3">{{ $b->minimum_stok }}</td>
                    <td class="px-6 py-3">
                        <a href="{{ route('barang.edit', $b->id) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                        <form id="delete-form-{{ $b->id }}" action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')

                         
                            <button type="button"
                                data-modal-target="popup-modal-{{ $b->id }}"
                                data-modal-toggle="popup-modal-{{ $b->id }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 
                                    font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 
                                    dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Hapus
                            </button>

                           
                            <div id="popup-modal-{{ $b->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 
                                    justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 
                                                hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex 
                                                justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal-{{ $b->id }}">
                                            ✕
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Yakin ingin menghapus barang ini?
                                            </h3>

                                            
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none 
                                                    focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg 
                                                    text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I’m sure
                                            </button>

                                            <button type="button"
                                                data-modal-hide="popup-modal-{{ $b->id }}"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none 
                                                    bg-white rounded-lg border border-gray-200 hover:bg-gray-100 
                                                    hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 
                                                    dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 
                                                    dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                No, cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody> -->
            <tbody>
                @forelse ($barang as $b)
                    <tr @if($b->stok <= $b->minimum_stok) style="background:#ffe5e5" @endif>
                        <td class="px-6 py-3">{{ $b->nama_barang }}</td>
                        <td class="px-6 py-3">{{ $b->kategori }}</td>
                        <td class="px-6 py-3">{{ $b->stok }}</td>
                        <td class="px-6 py-3">{{ $b->satuan }}</td>
                        <td class="px-6 py-3">{{ $b->minimum_stok }}</td>
                        <td class="px-6 py-3">
                            <a href="{{ route('barang.edit', $b->id) }}"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300
                                    font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                Edit
                            </a>

                            <form id="delete-form-{{ $b->id }}" action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <!-- Trigger modal -->
                                <button type="button"
                                    data-modal-target="popup-modal-{{ $b->id }}"
                                    data-modal-toggle="popup-modal-{{ $b->id }}"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 
                                        font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 
                                        dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    Hapus
                                </button>

                                <!-- Modal -->
                                <div id="popup-modal-{{ $b->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 
                                        justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 
                                                    hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex 
                                                    justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal-{{ $b->id }}">
                                                ✕
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Yakin ingin menghapus barang ini?
                                                </h3>

                                                <!-- Tombol submit form -->
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none 
                                                        focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg 
                                                        text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Yes, I’m sure
                                                </button>

                                                <button type="button"
                                                    data-modal-hide="popup-modal-{{ $b->id }}"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none 
                                                        bg-white rounded-lg border border-gray-200 hover:bg-gray-100 
                                                        hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 
                                                        dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 
                                                        dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    No, cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <div class="mt-4">
                            {{ $barang->links() }}
                        </div>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-red-500">
                            Kata kunci yang Anda cari tidak ada.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        
        </table>
        <div class="mt-4">
            {{ $barang->links() }}
        </div>

    </div>


</div>
@endsection
