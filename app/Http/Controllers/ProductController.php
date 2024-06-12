<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        $sizes = Size::pluck('size', 'id');
        return view("products.create", compact("users", "categories", "brands", "sizes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required|min:3|max:50',
            'sku' => 'required',
            'image' => 'required',
            'size_id' => '',
            'cost_price' => 'required',
            'retail_price' => 'required',
            'year' => 'required|min:2|max:4',
            'description' => '',
            'status' => 'required',
        ]);

        $requestData = $request->all();
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData['image'] = '/storage/' . $path;

        Product::create($requestData);
        flash('New Product Created Successfully')->success();
        return redirect('products');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        $sizes = Size::pluck('size', 'id');
        $product = Product::find($id);
        return view('products.edit', compact('product', 'users', 'categories', 'brands', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required|min:3|max:50',
            'sku' => 'required',
            // 'image' => 'required',
            'size_id' => '',
            'cost_price' => 'required',
            'retail_price' => 'required',
            'year' => 'required|min:2|max:4',
            'description' => '',
            'status' => 'required',
        ]);

        $product = Product::find($id);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $requestData['image'] = '/storage/' . $path;
        } else {
            $fileName = '';
        }
        $product->update($requestData);
        flash('New Product Update Successfully')->success();
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product->id);
        $product->delete();

        flash('Product Deleted Successfully')->success();
        return redirect('products');
    }
}
