<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'link'];

    public static function rules() {
        return [
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255'
        ];
    }
}
