<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit Product</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
 
        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
 
            <div class="mb-4">
                <label class="block font-medium">Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name', $product->name) }}">
            </div>
 
            <div class="mb-4">
                <label class="block font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
            </div>
 
            <div class="mb-4">
                <label class="block font-medium">Price</label>
                <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" value="{{ old('price', $product->price) }}">
            </div>
 
            <div class="mb-4">
                <label class="block font-medium">Current Image</label><br>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="120" class="rounded mb-2">
                @else
                    No Image
                @endif
            </div>
 
            <div class="mb-4">
                <label class="block font-medium">New Image</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>
 
            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('products.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </form>
    </div>
</body>
</html>
