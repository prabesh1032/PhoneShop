<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
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
            'brand' => 'nullable|string|max:255',
            'photopath' => 'nullable|image|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);
            $data['photopath']=$photoname;
        }
        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('images'), $photoname);

            if ($product->photopath) {
                $oldimage = public_path('images') . '/' . $product->photopath;
                if (file_exists($oldimage)) {
                    unlink($oldimage);
                }
            }
            $product->photopath->$photoname;
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product Updated successfully!');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image file if exists
        if ($product->photopath) {
            $imagePath = public_path('images') . '/' . $product->photopath;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
