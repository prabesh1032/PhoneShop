@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }} "
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500" required>
            @error('name')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500" required>{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500" required>
            @error('price')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Brand -->
        <div>
            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
            <input type="text" id="brand" name="brand" value="{{ old('brand', $product->brand) }}"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500" required>
            @error('brand')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500" required>
            @error('stock')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" id="image" name="image"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500" r>
            <div class="mt-2">
                @if($product->image)
                    <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}" class="h-24 w-24 rounded-md">
                @else
                    <p class="text-sm text-gray-500">No image uploaded.</p>
                @endif
            </div>
            @error('photopath')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3">
            <button type="submit"
                class="bg-cyan-600 text-white px-4 py-2 rounded-md shadow hover:bg-cyan-500 flex items-center space-x-2">
                <i class="ri-check-line"></i>
                <span>Update Product</span>
            </button>
            <a href="{{ route('products.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-400 flex items-center space-x-2">
                <i class="ri-close-line"></i>
                <span>Cancel</span>
            </a>
        </div>
    </form>
@endsection
