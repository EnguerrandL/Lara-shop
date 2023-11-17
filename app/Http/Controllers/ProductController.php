<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequestForm;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {





        return view('admin.index', [
            'products' => Product::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->get(),
            'user' => User::find(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.create', [
            'product' => $product,
            'user' => User::find(1)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequestForm $request, Product $product)
    {

        $validatedData = $request->validated();

        $image = $request->validated('image');
        $filename = uniqid() . '_' .  $image->getClientOriginalName();

        if ($image != null && !$image->getError()) {
            $validatedData['image'] = $image->storeAs('produits', $filename, 'public');
        }

        if ($product->image) {

            Storage::disk('public')->delete($product->image);
        }




        $validatedData['slug'] = Str::slug($request->name);
        $product = Product::create($validatedData);

        $product->save();

        return redirect()->route('products.index')
            ->with(['message' => 'Produit ajouté avec succès', 'class' => 'success']);
    }


    public function edit(Product $product)
    {



        return view('admin.edit', [
            'product' => $product,
            'user' => User::find(1)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequestForm $request, Product $product)
    {
        $validatedData = $request->validated();


        $image = $request->validated('image');
        $filename = uniqid() . '_' .  $image->getClientOriginalName();

        if ($image != null && !$image->getError()) {
            $validatedData['image'] = $image->storeAs('produits', $filename, 'public');
        }

        if ($product->image) {

            Storage::disk('public')->delete($product->image);
        }





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
