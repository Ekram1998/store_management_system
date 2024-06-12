<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   public function index()
    {
        $brands = Brand::all();
        return view("brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("brands.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:brands',
        ]);
        Brand::create($request->all());
        flash('New Brand Created Successfully')->success();
        return redirect('brands');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:brands',
        ]);
        $brand = Brand::find($id);
        $input = $request->all();
        $brand->update($input);
        flash('New Brand Updated Successfully')->success();
        return redirect('brands');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        flash('Brand Deleted Successfully')->success();
        return redirect('brands');
    }
}
