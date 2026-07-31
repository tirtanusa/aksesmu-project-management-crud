@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

<div>
    
</div>

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Produk</h1>
        <a href="{{ route('products.create') }}"
           class="hidden sm:flex bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-medium rounded-full">
            + Tambah Produk
        </a>
    </div>

    @if (session('success'))
            <div class="mb-4 rounded-md bg-green-50 border border-green-200 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
    @endif

    <div class="relative w-1/3 mb-6 flex items-center w-full justify-between">
        <div class="flex">
            <a href="{{ route('products.index', ['status' => 'all']) }}"
            class="text-sm flex items-center rounded-lg py-2 px-4 gap-2 text-sm {{ $status === 'all' ? 'bg-blue-600 text-white' : 'hover:bg-blue-600 hover:text-white' }}">
                Semua
            </a>
            <a href="{{ route('products.index', ['status' => 'in_stock']) }}"
            class="text-sm flex items-center rounded-lg py-2 px-4 gap-2 text-sm {{ $status === 'in_stock' ? 'bg-blue-600 text-white' : 'hover:bg-blue-600 hover:text-white' }}">
                Tersedia
            </a>
            <a href="{{ route('products.index', ['status' => 'out_of_stock']) }}"
            class="text-sm flex items-center rounded-lg py-2 px-4 gap-2 text-sm {{ $status === 'out_of_stock' ? 'bg-blue-600 text-white' : 'hover:bg-blue-600 hover:text-white' }}">
                Habis
            </a>
        </div>
        <div class="flex items-center gap-2">
            <div class= "flex items-center bg-white border border-gray-300 rounded-lg py-2 px-4 gap-2">
                        <x-eva-search class="w-6 h-6"/>
                        <input type="search" name="search" id="search" placeholder="Cari Produk..."
                        class="w-full focus: border-white">
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Harga</th>
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
                        <td class="px-6 py-4 text-sm text-gray-700 text-left whitespace-nowrap">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        @if ($product->stock > 20)
                            <td class="px-6 py-4 text-sm text-right text-gray-700">
                                {{ $product->stock }}
                            </td>
                        @elseif ($product->stock == 0)
                            <td class="px-6 py-4 text-sm text-right text-red-500">
                                <div class="flex items-center justify-end gap-2">
                                    <x-pixelarticons-warning-box class="w-5 h-5" />
                                    {{ $product->stock }}
                                </div>
                            </td>
                        @else
                            <td class="px-6 py-4 text-sm text-right text-yellow-500">
                                {{ $product->stock }}
                            </td>
                        @endif
                        <td class="px-6 py-4 text-sm text-center">
                            <details class="relative inline-block text-left">
                                <summary class="list-none cursor-pointer px-2 py-1 rounded hover:bg-gray-100 inline-flex">
                                    <x-tabler-dots />
                                </summary>

                                <div class="absolute right-0 z-10 mt-1 w-32 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <a href="{{ route('products.edit', $product) }}"
                                    class="flex block px-4 py-2 text-sm text-gray-700 hover:bg-blue-600 hover:text-white gap-3">
                                        <x-lucide-pen class="w-5 h-5"/>
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-500 hover:text-white flex gap-3 cursor-pointer">
                                            <x-heroicon-o-trash class="w-5 h-5"/>
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