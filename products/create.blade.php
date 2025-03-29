@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Description:</label>
        <textarea name="description" required></textarea>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" required>

        <label>Brand:</label>
        <input type="text" name="brand" required>

        <label>Stock:</label>
        <input type="number" name="stock" required>

        <label>Image:</label>
        <input type="file" name="image" accept="image/*">

        <button type="submit">Add Product</button>
    </form>
@endsection