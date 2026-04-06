<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Create Product</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Create Product</h1>
 
        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
 
            <div class="mb-4">
                <label class="block font-medium">Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name') }}">
            </div>
 
            <div class="mb-4">
                <label class="block font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
            </div>
 
            <div class="mb-4">
                <label class="block font-medium">Price</label>
                <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" value="{{ old('price') }}">
            </div>
 
            <div class="mb-4">
                <label class="block font-medium">Image</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>
 
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            <a href="{{ route('products.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </form>
    </div>
</body>
</html>
 