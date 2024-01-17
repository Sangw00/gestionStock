<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view("product.index")->with("products",$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view("product.create")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
     Product::validate($request);

        $newProduct = new Product();
        $newProduct->name=$request->input('name');
        $newProduct->description=$request->input('description');
        $newProduct->setImage("game.png");
        $newProduct->price=$request->input('price');
        $newProduct->category_id=$request->input('category_id');
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }
        return redirect("/products");
        
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
    public function destroy(string $id)
    {
        //
    }
}
