<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #001f3f;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .button {
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }
        .add { background-color: green; }
        .add:hover { background-color: #006400; }
        .logout { background-color: red; }
        .logout:hover { background-color: #8b0000; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .edit { background-color: orange; padding: 8px 12px; }
        .edit:hover { background-color: #ff8c00; }
        .delete { background-color: red; padding: 8px 12px; border: none; cursor: pointer; }
        .delete:hover { background-color: darkred; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <div class="button-container">
            <a href="{{ route('home') }}" class="button add" style="background-color: rgb(13, 13, 117);">🏠 Home</a>
            <a href="{{ route('products.create') }}" class="button add">➕ Add Product</a>
            <a href="{{ route('logout') }}" class="button logout">🚪 Logout</a>
        </div>

        <h2>Product List</h2>

        @if ($products->isEmpty())
            <p>No products available.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>₱{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="button edit">✏️ Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button delete">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">No products available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        @endif
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this product?");
        }
    </script>
</body>
</html>