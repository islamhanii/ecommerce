<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_details_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product_details() {
        return $this->belongsTo(ProductDetail::class, 'product_details_id', 'id');
    }
}
