<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

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

    /*-------------------------------------Relations-----------------------------------*/

    public function sub_category() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    
    public function product_names() {
        return $this->hasMany(ProductName::class, 'product_id', 'id')->with('language');
    }

    public function product_details() {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }

    /*-------------------------------------Name Attribute-----------------------------------*/

    public function getNameAttribute() {
        $path = Request::path();
        $pathData = explode('/', $path);
        $languageName = array_pop($pathData);
        $language = Language::select('id')->where('name', $languageName)->first();
        
        $productName = null;
        if($language) {
            $productName = ProductName::select('name')->where([
                                                                ['product_id', $this->id],
                                                                ['language_id', $language->id]
                                                              ])->first();
        }
        return ($productName)?$productName->name:'Unknown';
    }

    /*-------------------------------------Sizes Attribute-----------------------------------*/

    public function getSizesAttribute() {
        $sizes = DB::table('product_details')->where('product_id', $this->id)
        ->join('sizes', 'sizes.id', '=', 'product_details.size_id')
        ->join('size_units', 'sizes.size_unit_id', '=', 'size_units.id')
        ->select('sizes.id', 'sizes.size_unit_id', 'size', 'unit')
        ->groupBy('sizes.id', 'sizes.size_unit_id', 'size', 'unit')
        ->get();
        return $sizes;
    }
}
