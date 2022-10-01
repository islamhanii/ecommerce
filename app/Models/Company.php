<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'sort'];

    public static function rules() {
        return [
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'sort'  => 'required|integer|min:1|max:65000|unique:companies'
        ];
    }
}
