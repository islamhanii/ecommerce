<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeUnit extends Model
{
    use HasFactory;

    protected $fillable = ['unit'];


    public static function rules() {
        return [
            'unit' => 'required|string|max:255'
        ];
    }

    public function sizes() {
        return $this->hasMany(Size::class, 'size_unit_id', 'id');
    }
}
