@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Availability</label>
            <select name="availability" class="form-control">
                <option value="1" {{ $product->availability ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$product->availability ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>

        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name="brand" value="{{ $product->brand }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection