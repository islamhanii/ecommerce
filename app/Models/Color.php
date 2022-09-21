<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hexa'];

    public static function rules() {
        return [
            'name' => 'required|min:3|max:255',
            'hexa' => 'required|min:7|max:7|starts_with:#'
        ];
    }

    public function product_details() {
        return $this->hasMany(ProductDetail::class, 'color_id', 'id');
    }
}
