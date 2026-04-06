<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Product List</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Product List</h1>
 
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
 
        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Add Product
        </a>
 
        <div class="mt-6 overflow-x-auto">
            <table class="w-full bg-white shadow rounded">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3 text-left">Image</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Description</th>
                        <th class="p-3 text-left">Price</th>
                        <th class="p-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b">
                            <td class="p-3">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="80" class="rounded">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="p-3">{{ $product->name }}</td>
                            <td class="p-3">{{ $product->description }}</td>
                            <td class="p-3">{{ $product->price }}</td>
                            <td class="p-3 space-x-2">
                                <a href="{{ route('products.show', $product) }}" class="text-green-600">View</a>
                                <a href="{{ route('products.edit', $product) }}" class="text-blue-600">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600"
                                        onclick="return confirm('Delete this product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>