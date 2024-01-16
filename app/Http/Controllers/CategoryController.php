<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $categories =Category::all();
        return view("category.index")->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $category=Category::validate($request);
         Category::create($category);
         return redirect("/categories");
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
        return view("category.show", [
            'products' => $products,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findOrFail($id);
        return view("category.edit")->with("category",$category);
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


        return redirect("/categories");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::Destroy($id);
        return back();
        
    }
}
