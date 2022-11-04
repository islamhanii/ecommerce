<?php

namespace App\Http\Traits;

trait UserRoleTrait {
    private function getUserRole($userId, $roleId) {
        return $this->userRoleModel->where([
            ['role_id', $roleId],
            ['user_id', $userId]
        ])->first();
    }
}