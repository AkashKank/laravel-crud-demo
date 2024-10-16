<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::latest()->paginate(5);
        $products = Product::orderBy('id', 'asc')->paginate(5);

        return view('products.index', compact('products'))->with(request()->input('page'));
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
        //validate the input
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        //create new product in the database
        Product::create($request->all());

        //redirect the user and send friendly message
        return redirect()->route('products.index')->with('success','Product created sucessfully...!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //Dispaly the perticular product
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
         //validate the input
         $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        //update new product in the database
        // $product::update($request->all());
        $product->update($request->only('name', 'detail'));

        //redirect the user and send friendly message
        return redirect()->route('products.index')->with('success','Product updated sucessfully...!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //delete the product
        $product->delete();

        // redirect the user and display sucess message
        return redirect()->route('products.index')->with('success','Product Delete sucessfully...!');
    }
}
