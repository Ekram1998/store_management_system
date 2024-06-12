<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view("sizes.index", compact("sizes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("sizes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required|min:1|max:50|unique:sizes',
        ]);
        Size::create($request->all());
        flash('New Size Created Successfully')->success();
        return redirect('sizes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size = Size::find($id);
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'size' => 'required|min:1|max:50|unique:sizes',
        ]);
        $size = Size::find($id);
        $input = $request->all();
        $size->update($input);
        flash('New Size Updated Successfully')->success();
        return redirect('sizes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::find($id);
        $size->delete();

        flash('Size Deleted Successfully')->success();
        return redirect('sizes');
    }
}
