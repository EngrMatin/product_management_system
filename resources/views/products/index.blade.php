@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Product List</h1>

    <div style="text-align: right; margin-bottom: 1rem;">
        <a href="{{ route('products.create') }}" class="btn btn-success me-3">Create New Product</a>
    </div>
    
    <form action="{{ url('/products') }}" method="GET" class="mb-4 " style="width: 400px;">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search by Product ID or Description" value="{{ request('search') }}" >
          <div class="input-group-btn">
            <button class="btn btn-primary" type="submit"> Search </button>
          </div>
        </div>
    </form>
     
    <div class="mb-3">
        <a href="{{ url('/products?sortBy=name&sortOrder=' . ($sortBy == 'name' && $sortOrder == 'asc' ? 'desc' : 'asc')) }}" class="btn btn-secondary">
            Sort by Name {{ $sortBy == 'name' ? ($sortOrder == 'asc' ? '↑' : '↓') : '' }}
        </a>
        <a href="{{ url('/products?sortBy=price&sortOrder=' . ($sortBy == 'price' && $sortOrder == 'asc' ? 'desc' : 'asc')) }}" class="btn btn-secondary">
            Sort by Price {{ $sortBy == 'price' ? ($sortOrder == 'asc' ? '↑' : '↓') : '' }}
        </a>
    </div>

    @if($products->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->appends(request()->except('page'))->links() }}
    @else
        <p>No products found.</p>
    @endif
</div>
@endsection
