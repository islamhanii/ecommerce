<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'policy_category_id'];

    public static function rules() {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:10000',
            'policy_category_id' => 'required|exists:policy_categories,id'
        ];
    }

    public function policy_category() {
        return $this->belongsTo(PolicyCategory::class, 'policy_category_id', 'id');
    }
}
