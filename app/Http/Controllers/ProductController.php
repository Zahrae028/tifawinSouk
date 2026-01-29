<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $products = Product::all();
            return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $request->validate([
                        'name' => 'required | string | max : 255',
                        'reference' => 'required|string|max:255|unique:products,reference',
                        'short_description' => 'nullable|string',
                        'price' => 'required|numeric|min:0',
                        'stock' => 'required|integer|min:0',
                        'category_id' => 'required|exists:categories,id',
                        'image' => 'nullable|image|max:2048',
                    ]
                );

                Product::create([
                    'name' => $request->name,
                    'reference' => $request->reference,
                    'short_description' => $request->short_description,
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'category_id' => $request->category_id,
                    'image' => $request->image,
                ])
                ;

                $imagePath = null;
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('products', 'public');
                }

                return redirect()->route('products.index')
                ->with('success', 'Product updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Product = Product::findOrFail($id);

        return view('products.show', compact('Product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
                        'name' => 'required | string | max : 255',
                        'reference' => 'required|string|max:255|unique:products,reference',
                        'short_description' => 'nullable|string',
                        'price' => 'required|numeric|min:0',
                        'stock' => 'required|integer|min:0',
                        'category_id' => 'required|exists:categories,id',
                        'image' => 'nullable|image|max:2048',
                    ]
                );

                $product = Product::findOrFail($id);
                Product::update([
                    'name' => $request->name,
                    'reference' => $request->reference,
                    'short_description' => $request->short_description,
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'category_id' => $request->category_id,
                    'image' => $request->image,
                ])
                ;

                $imagePath = null;
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('products', 'public');
                }

                return redirect()->route('products.index')
                ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully!');
    }
}
