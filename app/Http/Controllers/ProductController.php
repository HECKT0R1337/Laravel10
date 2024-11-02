<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Test::get();
        return view('product.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Test::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //    $card=Test::where('id',$id)->first();
       $card=Test::findOrFail($id);
       return view('product.show',compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $card=Test::findOrFail($id);
        return view('product.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $card= Test::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description 
        ]);

        return redirect()->route('product.show',$id)->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del=Test::where('id',$id)->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
