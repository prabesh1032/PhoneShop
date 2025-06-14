@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Product Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                placeholder="Enter Product Name"required>
            @error('name')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                placeholder="Enter a short description"required>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price (in NPR)</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                placeholder="Enter Price"required>
            @error('price')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Brand -->
        <div>
            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
            <input type="text" id="brand" name="brand" value="{{ old('brand') }}"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                placeholder="Enter Brand Name (e.g., Apple, Samsung)"required>
            @error('brand')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"
                placeholder="Enter Available Stock"required>
            @error('stock')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="photopath" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" id="photopath" name="photopath"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500"required>
            @error('photopath')
                <div class="text-red-500 text-sm mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3">
            <button type="submit"
                class="bg-cyan-600 text-white px-4 py-2 rounded-md shadow hover:bg-cyan-500 flex items-center space-x-2">
                <i class="ri-save-line"></i>
                <span>Save Product</span>
            </button>
            <a href="{{ route('products.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-md shadow hover:bg-gray-400 flex items-center space-x-2">
                <i class="ri-close-line"></i>
                <span>Cancel</span>
            </a>
        </div>
    </form>
@endsection
