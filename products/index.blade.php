@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1>Product List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Stock</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>₱{{ $product->price }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No products available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection