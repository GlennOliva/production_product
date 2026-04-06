<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>View Product</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Product Details</h1>
 
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="200" class="rounded mb-4">
        @endif
 
        <p class="mb-2"><strong>Name:</strong> {{ $product->name }}</p>
        <p class="mb-2"><strong>Description:</strong> {{ $product->description }}</p>
        <p class="mb-2"><strong>Price:</strong> {{ $product->price }}</p>
 
        <a href="{{ route('products.index') }}" class="text-blue-600">Back to List</a>
    </div>
</body>
</html>