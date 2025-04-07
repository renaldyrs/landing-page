
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">Edit Produk</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Supplier -->
            <div class="mb-4">
                <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kode Produk -->
            <div class="mb-4">
                <label for="code" class="block text-sm font-medium text-gray-700">Kode Produk</label>
                <input type="text" name="code" id="code" class="w-full border rounded-lg p-2 bg-gray-100" value="{{ $product->code }}" readonly>
            </div>

            <!-- Nama Produk -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="name" id="name" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" value="{{ $product->name }}" required>
            </div>

            <!-- Harga -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" id="price" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" value="{{ $product->price }}" required>
            </div>

            <!-- Stok -->
            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stock" id="stock" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500" value="{{ $product->stock }}" required>
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category_id" id="category_id" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">{{ $product->description }}</textarea>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                <input type="file" name="image" id="image" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-md">
                    </div>
                @endif
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end">
                <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection