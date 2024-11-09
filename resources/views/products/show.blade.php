@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 60%; margin: 0 auto; padding: 20px;">
    <h1 class="mb-4">Product Details</h1>
    <div class="card shadow-sm rounded-3" >
        <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
            <p><strong>Description:</strong> {{ $product->description ?? 'No description available' }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock ?? 'Not specified' }}</p>

            @if ($product->image)
                <p><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="300" class="img-fluid mb-3">
            @endif
        </div>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to Product List</a>
</div>
@endsection
