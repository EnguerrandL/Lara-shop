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
    public function create(Product $product)
    {
        return view('admin.create', [
            'product' => $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequestForm $request, Product $product)
    {

        $validatedData = $request->validated();

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public', $fileName);

        $product->image  = $fileName;

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
    public function edit(Product $product)
    {



        return view('admin.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequestForm $request, Product $product)
    {
        $validatedData = $request->validated();

        $product->update($validatedData);

        $product->slug = Str::slug($request->name);

        $product->save();


        return redirect()->route('products.index')
            ->with(['message' => 'le produit : ' . $product->name .  ' à été éditer avec succès', 'class' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return back()->with(['message' => 'Le produit à été supprimé avec succès', 'class' => 'danger']);
    }
}
