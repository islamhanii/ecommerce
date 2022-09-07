<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'category_id'];

    public static function rules() {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:webp,jpg,jpeg,png',
            'select' => 'required|exists:categories,id'
        ];
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'sub_category_id', 'id');
    }
}
