@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 60%; margin: 0 auto;">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded-3 shadow-sm">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" value="{{ $product->product_id }}" readonly>
        </div>

        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
        </div>

        <div class="form-group mt-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($product->image)
                <p class="mt-2">Current image:</p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Product</button>
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Cancel</a>
</div>
@endsection
