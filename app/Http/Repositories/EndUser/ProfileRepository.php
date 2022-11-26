<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ProfileInterface;
use App\Http\Traits\UserTrait;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Support\Facades\Hash;

class ProfileRepository implements ProfileInterface {
    public function index() {
        $wishlistsCount = WishList::where('user_id', auth()->user()->is)->count();
        return view('endUser.profile', compact('wishlistsCount'));
    }

    public function update($request){
        $user = User::findOrFail(auth()->user()->id);

        $password = $user->password;
        if($request->password) {
            $password = Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password
        ]);

        session()->flash('success', 'Profile updated successfully.');
        return redirect()->back();
    }
}