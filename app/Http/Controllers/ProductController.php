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
       
        try {
            
            Product::validate($request);
        
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
        
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
        
                // Use the 'public' disk and specify the 'images' directory within it
                Storage::disk('public')->put(
                    'images/' . $imageName,
                    file_get_contents($request->file('image')->getRealPath())
                );
        
                $product->image = $imageName;
                $product->price = $request->input('price');
                $product->category_id = $request->input('category_id');
                $product->save();
            }
        
            return redirect("/products");
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Product::findOrFail($id);
 return view("products.show")->with("product",$product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $product= Product::findOrFail($id);
        return view("product.edit",[
        "product"=>$product,
        "categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product= Product::findOrFail($id);
        Product::validate($request);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
    
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
    
            // Use the 'public' disk and specify the 'images' directory within it
            Storage::disk('public')->put(
                'images/' . $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
    
            $product->image = $imageName;
            $product->price = $request->input('price');
            $product->category_id = $request->input('category_id');
            $product->save();
        }
    
        return redirect("/products");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
