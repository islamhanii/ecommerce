<?php

namespace App\Http\Traits;

trait UserTrait {
    private function getUserByEmail($email) {
        return $this->userModel->where('email', $email)->first();
    }

    private function checkUserType($email, $type) {
        if(in_array($type, ['user', 'admin'])) {
            $user = $this->getUserByEmail($email);
            $role = $this->getRoleByType($type);
            if($user && $role) {
                $userRole = $this->getUserRole($user->id, $role->id);
                if($userRole) {
                    return $type;
                }
            }
        }

        return null;
    }
}