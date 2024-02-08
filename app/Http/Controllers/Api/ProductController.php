<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
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
    $data = Product::with('category')->get();

    $products = ProductResource::collection($data);


    
    //$products = ProductResource::collection(Product::all()->with('category')->get());
    return response()->json([
        "title" => "touts le produits",
        "status"=>200,
        "body" => $products
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
       
            Product::validate($request);
        
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
        
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName =  md5(microtime()) . '.' . $image->getClientOriginalExtension(); // Use a clean filename
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
            
            return response()->json([
                "message" => "success",
                "status"=>200,
                
            ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Product::findOrFail($id);
        $product= new ProductResource($data);
        return response()->json([
            "title" => "detail de produit",
            "status"=>200,
            "body" => $product
        ]);
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
            return response()->json([
                "message" => "success",
                "status"=>200,
                
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::Destroy($id);
        return response()->json([
            "message" => "success",
            "status"=>200,
            
        ]);
    }
}
