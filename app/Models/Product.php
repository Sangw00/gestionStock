<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
    ];
    public static function validate($request)
    {
       return $request->validate([
            "name" => "required|max:255",
            "description" => "required|min:20",
            "image" => "required",
            "price" => "required|int",
        ]);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
