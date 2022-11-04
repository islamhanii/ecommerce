<?php

namespace App\Http\Traits;

trait RoleTrait {
    private function getRoleByType($type) {
        return $this->roleModel->where('name', $type)->first();
    }
}