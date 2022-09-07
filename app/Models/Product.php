<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'price', 'main_image', 'sub_category_id'];

    public static function rules() {
        return [
            'name_en' => 'required|min:3',
            'name_ar' => 'required|min:3',
            'description' => 'required|min:10',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'price' => 'required|numeric',
            'select' => 'required|exists:sub_categories,id'
        ];
    }

    public function sub_category() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    
    public function productNames() {
        return $this->hasMany(ProductName::class, 'product_id', 'id');
    }
}
