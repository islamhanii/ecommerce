<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['size', 'size_unit_id'];

    public static function rules() {
        return [
            'size' => 'required|numeric',
            'size_unit_id' => 'required|exists:size_units,id'
        ];
    }

    public function size_unit() {
        return $this->belongsTo(SizeUnit::class, 'size_unit_id', 'id');
    }

    public function product_details() {
        return $this->hasMany(ProductDetail::class, 'size_id', 'id');
    }
}
