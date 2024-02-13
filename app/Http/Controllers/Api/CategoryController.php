<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = Category::all();
    $categories = CategoryResource::collection($data);
    $products = DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->where('categories.id', "products.id")
    ->select('products.*')
    ->count();
    return response()->json([
        "title" => "touts le categories",
        "status"=>200,
        "data" => $categories,
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
         $category=Category::validate($request);
         Category::create($category);
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

        $category=Category::findOrFail($id);
    $products = DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->where('categories.id', $category->id)
    ->select('products.*')
    ->get();
            return response()->json([
                "title" => "produit par category",
            "status"=>200,
                'category' => $category->name,
                "number of products" =>$products->count(),
                'all products' =>$products,
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
        $category=Category::findOrFail($id);
        $request=Category::validate($request);
        $category->fill( $request);
        $category->save();
        return response()->json([
            "message" => "success",
            "status"=>200,
            
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::Destroy($id);
        return response()->json([
            "message" => "success",
            "status"=>200,
            
        ]);
    }
}
