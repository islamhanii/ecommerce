<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'image'];

    public static function rules() {
        return [
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'description' => 'required|string|min:10|max:10000'
        ];
    }
}
