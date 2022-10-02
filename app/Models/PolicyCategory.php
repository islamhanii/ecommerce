<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function rules() {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function policies() {
        return $this->hasMany(PolicyCategory::class, 'policy_category_id', 'id');
    }
}
