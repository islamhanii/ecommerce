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
            'stock' => 'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id'
        ];
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function size() {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function color() {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function wish_lists()
    {
        return $this->hasMany(WishList::class, 'product_details_id', 'id');
    }
}
