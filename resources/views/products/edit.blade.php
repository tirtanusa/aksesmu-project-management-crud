@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <!-- Header -->
    <div class="mb-6 flex justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Edit Produk</h1>
        <a href="{{ route('products.index') }}" class="flex gap-1 text-sm text-gray-700 items-center hover:underline hover:underline-offset-3">
            <x-heroicon-o-arrow-left class="w-5 h-5"/>
            <p class="hidden sm:flex">
                Kembali ke Halaman Produk
            </p>
        </a>
    </div>
    <!-- Header -->

    <!-- Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Produk
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                       class="w-full px-2 py-1 rounded-md border border-gray-700 shadow-sm @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi <span class="text-gray-400">(opsional)</span>
                </label>
                <textarea name="description" id="description" rows="3"
                          class="w-full px-2 py-1 rounded-md border border-gray-700 shadow-sm @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                    Harga
                </label>
                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}"
                       class="w-full px-2 py-1 rounded-md border border-gray-700 shadow-sm @error('price') border-red-500 @enderror">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">
                    Stok
                </label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                       class="w-full px-2 py-1 rounded-md border border-gray-700 shadow-sm @error('stock') border-red-500 @enderror">
                @error('stock')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Update
                </button>
                <a href="{{ route('products.index') }}"
                   class="text-gray-600 hover:text-gray-800 text-sm font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
    <!-- Form -->

@endsection