<?php

namespace App\Models;

use App\Rules\EndUser\StockRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_details_id', 'count'];

    public static function rules() {
        $validations = [
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id'
        ];

        $productDetails = ProductDetail::select('id')->where([
            ['product_id', request('product_id')],
            ['color_id', request('color_id')],
            ['size_id', request('size_id')]
        ])->first();

        if(!$productDetails) {
            session()->flash('error', 'Product is not founded');
            return redirect()->back();
        }

        request()->request->add(['product_details_id' => $productDetails->id]);

        return array_merge($validations, [
            'quantity' => ['required', 'min:1', new StockRule(request('product_details_id'))]
        ]);
    }

    /*----------------------------------------Relations----------------------------------*/
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product_details() {
        return $this->belongsTo(ProductDetail::class, 'product_details_id', 'id');
    }

    /*----------------------------------------Details Attribute----------------------------------*/
    
    public function getDetailsAttribute() {
        $productDetails = ProductDetail::select('product_id', 'size_id', 'image', 'stock')->where('id', $this->product_details_id)->with('size.size_unit')->first();

        $product = Product::select('id', 'price')->where('id', $productDetails->product_id)->first()->append('name');
        $productDetails->name = $product->name;
        $productDetails->price = $product->price;


        return $productDetails;
    }
}
