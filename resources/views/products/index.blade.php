@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Produk</h1>
        <a href="{{ route('products.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-medium rounded-full">
            + Tambah Produk
        </a>
    </div>

    <div class="relative w-1/3 mb-6 flex items-center w-full justify-between">
        <div class="flex">
            <div class="flex items-center hover:bg-blue-600 hover:text-white rounded-lg py-2 px-4 gap-2 cursor-pointer">
                All
            </div>
            <div class="flex items-center hover:bg-blue-600 hover:text-white rounded-lg py-2 px-4 gap-2 cursor-pointer">
                In Stock
            </div>
            <div class="flex items-center hover:bg-blue-600 hover:text-white rounded-lg py-2 px-4 gap-2 cursor-pointer">
                Out of Stock
            </div>
        </div>
        <div class="flex items-center gap-2">
            <div class= "flex items-center bg-white border border-gray-300 rounded-lg py-2 px-4 gap-2">
                        <x-eva-search class="w-6 h-6"/>
                        <input type="search" name="search" id="search" placeholder="Cari Produk..."
                        class="w-full focus: border-white">
            </div>
            <div class="flex items-center hover:bg-blue-600 hover:text-white rounded-lg py-2 px-4 gap-2 cursor-pointer">
                <x-bi-filter />
                Filters
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Stok</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($products as $product)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $product->description ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 text-right">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 text-right">
                            {{ $product->stock }}
                        </td>
                        <td class="px-6 py-4 text-sm text-center">
                            <details class="relative inline-block text-left">
                                <summary class="list-none cursor-pointer px-2 py-1 rounded hover:bg-gray-100 inline-flex">
                                    <x-tabler-dots />
                                </summary>

                                <div class="absolute right-0 z-10 mt-1 w-32 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                                    <a href="{{ route('products.edit', $product) }}"
                                    class="flex block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 gap-3">
                                        <x-lucide-pen class="w-5 h-5"/>
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 flex gap-3 cursor-pointer">
                                            <x-heroicon-o-trash class="w-5 h-5 text-red-500"/>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </details>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500">
                            Belum ada produk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>

@endsection