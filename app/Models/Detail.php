<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    public static function rules() {
        return [
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255'
        ];
    }
}
