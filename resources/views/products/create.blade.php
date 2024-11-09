@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="width: 60%">
        <h1 class="mb-4">Create Product</h1>
        <form action="{{ route('products.store') }}" method="POST" class="border p-4 rounded shadow-lg">
            @csrf
            <div class="mb-3">
                <label for="product_id" class="form-label">Product ID:</label>
                <input type="text" name="product_id" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>
            
            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" name="stock" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Image URL:</label>
                <input type="text" name="image" class="form-control">
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Submit</button>
            </div>
        </form>
    </div>
@endsection

