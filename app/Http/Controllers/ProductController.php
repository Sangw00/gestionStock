<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return Inertia::render("Products",["products",$products]);
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
    public function store(ProductRequest $request)
{
    

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName =  md5(microtime()) . basename($image->getClientOriginalName()); // Use a clean filename
            $imageResized = Image::make($image->getRealPath())
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode($image->getClientOriginalExtension(), 80);
            Storage::disk('public')->put('images/' . $imageName, $imageResized->__toString());

            $product->image = $imageName;
        }

        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect("/products");

}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Product::findOrFail($id);
 return view("product.show")->with("product",$product);
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
            $image = $request->file('image');
            $imageName = basename($image->getClientOriginalName()); // Use a clean filename
            $imageResized = Image::make($image->getRealPath())
                ->resize(300, 200)
                ->encode($image->getClientOriginalExtension(), 80);
            Storage::disk('public')->put('images/' . $imageName, $imageResized->__toString());

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
        Product::Destroy($id);
        return back();
    }
}
