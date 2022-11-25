<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\AuthInterface;
use App\Http\Traits\RoleTrait;
use App\Http\Traits\UserRoleTrait;
use App\Http\Traits\UserTrait;
use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthInterface {
    use UserTrait, RoleTrait, UserRoleTrait;

    private $userModel, $roleModel, $userRoleModel, $addressModel;

    /*-------------------------------------Constructor-----------------------------------*/
    public function __construct(User $userModel, Role $roleModel, UserRole $userRoleModel, Address $addressModel) {
        $this->userModel = $userModel;
        $this->roleModel = $roleModel;
        $this->userRoleModel = $userRoleModel;
        $this->addressModel = $addressModel;
    }

    /*-------------------------------------User Login-----------------------------------*/
    public function index() {
        return view('endUser.login');
    }

    public function login($request) {
        $credentials = $request->only('email', 'password');
        if(auth()->attempt($credentials)) {
            return redirect(route('home', ['en']));
        }
        
        session()->flash('error', 'Invalid email or password.');
        return redirect(route('user.loginPage'));
    }

    /*-------------------------------------User Register-----------------------------------*/
    public function registerPage() {
        return view('endUser.register');
    }

    public function register($request) {
        $user = $this->getUserByEmail($request->email);

        if(!$user) {
            $user = $this->userModel->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);

            $roleId = $this->getRoleByType('user')->id;
            $this->userRoleModel->create([
                'user_id' => $user->id,
                'role_id' => $roleId
            ]);

            $this->addressModel->create([
                'user_id' => $user->id,
                'city' => $request->city,
                'details' => $request->address,
                'is_default' => 1
            ]);

            session()->flash('success', 'User account created successfully');
            return redirect(route('user.loginPage'));
        }
        
        session()->flash('error', 'You already have an account.');
        return redirect(route('user.registerPage'));
    }

    /*-------------------------------------User Logout-----------------------------------*/
    public function logout() {
        session()->flush();
        auth()->logout();
        return redirect(route('home', ['en']));
    }
}