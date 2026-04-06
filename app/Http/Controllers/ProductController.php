<?php
 
namespace App\Http\Controllers;
 
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }
 
    public function create()
    {
        return view('products.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
 
        $imagePath = null;
 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
 
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
 
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
 
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
 
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
 
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
 
        $imagePath = $product->image;
 
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
 
            $imagePath = $request->file('image')->store('products', 'public');
        }
 
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
 
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }
 
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
 
        $product->delete();
 
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}