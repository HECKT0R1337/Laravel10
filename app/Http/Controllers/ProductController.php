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

        // $cards = Test::withTrashed()->get();

        $cards = Test::orderBy('id')->get();
        $trashed = Test::orderBy('id')->onlyTrashed()->get();

        // if ($cards->trashed()) {
        return view('product.index', compact('cards', 'trashed'));
        // }

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
        $data = $request->validate([
            'name' => 'required|string|min:3|max:10',
            'description' => 'required|string|min:3|max:100',
            'status' => 'required|in:enable,disable',
            'show' => 'required|in:0,1'
        ]);

        Test::create($data);
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //    $card=Test::where('id',$id)->first();
        $card = Test::findOrFail($id);
        return view('product.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $card = Test::findOrFail($id);
        return view('product.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:10',
            'description' => 'required|string|min:3|max:100',
            'status' => 'required|in:enable,disable',
            'show' => 'required|in:0,1'
        ], [], [
            'name' => 'Name Cell',
            'description' => 'Description data'
        ]);

        $card = Test::where('id', $id)->update($data);
        return redirect()->route('product.show', $id)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del = Test::where('id', $id)->forceDelete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function softDelete(string $id)
    {
        $del = Test::where('id', $id)->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function restore(string $id)
    {
        $del = Test::where('id', $id)->restore();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
