<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*-------------------------------------Rules-----------------------------------*/
    public static function rules() {
        return [
            'email' => 'required|email:filter',
            'password' => 'required|string|min:8'
        ];
    }
    public static function additionalRules() {
        return [
            'name' => 'required|string|min:3|max:255',
            'phone' => 'required|string|min:8|max:50',
            'city' => 'required|string|min:3|max:50',
            'address' => 'required|string|min:15|max:500',
            'password' => 'required|string|min:8|max:32|confirmed'
        ];
    }

    /*-------------------------------------Relations-----------------------------------*/
    public function userRoles() {
        return $this->hasMany(UserRole::class, 'user_id', 'id');
    }

    public function addresses() {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function wish_lists() {
        return $this->hasMany(WishList::class, 'user_id', 'id');
    }
}
