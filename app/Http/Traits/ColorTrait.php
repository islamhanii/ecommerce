<?php

namespace App\Http\Traits;

trait ColorTrait {
    private function getColors() {
        return $this->colorModel->orderBy('hexa', 'desc')->get();
    }

    private function getColorById($colorId) {
        return $this->colorModel->findOrFail($colorId);
    }
}