@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="mb-5 flex justify-between items-center">
        <h1 class="text-3xl font-semibold">Product Management</h1>
        <a href="{{ route('products.create') }}" class="bg-cyan-600 text-white px-5 py-2 rounded-lg flex items-center space-x-2 hover:bg-cyan-700 transition duration-300">
            <i class="ri-add-line text-lg"></i>
            <span>Add New Product</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                @if($product->photopath)
                    <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">
                        <i class="ri-image-line text-4xl"></i>
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="text-lg font-semibold inline-block">
                        {{ $product->name }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-1">Brand: {{ $product->brand ?? 'N/A' }}</p>
                    <p class="text-xl font-bold text-cyan-600">₹{{ number_format($product->price, 2) }}</p>
                    <span class="px-3 py-1 inline-block rounded-full text-sm font-medium mt-2
                        {{ $product->stock > 0 ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                    </span>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center space-x-1">
                            <i class="ri-edit-2-line"></i><span>Edit</span>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 flex items-center space-x-1">
                                <i class="ri-delete-bin-5-line text-xl mr-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
