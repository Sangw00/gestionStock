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
    $data = Product::all();
    $products = ProductResource::collection($data);
    return response()->json([
        "title" => "touts le produits",
        "status"=>200,
        "body" => $products
    ],200);
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
        try {
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
            
            return response()->json(["status" => 200]);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500); // Return the error message with a 500 status code
        }
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
