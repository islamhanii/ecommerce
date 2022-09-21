<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'description', 'price', 'main_image', 'sub_category_id'];

    public static function rules() {
        return [
            'name_en' => 'required|string|min:3|max:255',
            'name_ar' => 'required|string|min:3|max:255',
            'code' => 'required|string|unique:products',
            'description' => 'required|string|min:10|max:10000',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'price' => 'required|numeric',
            'sub_category_id' => 'required|exists:sub_categories,id'
        ];
    }

    public function sub_category() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    
    public function product_names() {
        return $this->hasMany(ProductName::class, 'product_id', 'id');
    }

    public function product_details() {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }
}
