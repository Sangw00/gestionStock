<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
    public static function validate($request)
    {
       return $request->validate([
            "name" => "required|max:255",
            "description" => "required",
        ]);
    }
}
