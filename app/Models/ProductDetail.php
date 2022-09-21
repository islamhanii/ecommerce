<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = ['stock', 'image', 'product_id', 'size_id', 'color_id'];

    public static function rules() {
        return [
            'stock' => 'reuired|integer',
            'image' => 'reuired|mimes:png,jpg,jpeg,webp',
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id'
        ];
    }

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function sizes() {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function colors() {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
