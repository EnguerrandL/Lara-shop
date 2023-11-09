<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequestForm;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        



        return view('admin.index', [
            'products' => Product::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequestForm $request, Product $product)
    {
        
        $validatedData = $request->validated(); 
    
   
        $validatedData['slug'] = Str::slug($request->name);
        $product = Product::create($validatedData);
       
        $product->save();
    

        return redirect()->route('products.index')->with(['message' => 'Produit ajouté avec succès', 'class' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Product $product)
    {
     
        $product->delete();
       return back()->with(['message' => 'Le produit à été supprimé avec succès', 'class' => 'danger']);
    }
}
