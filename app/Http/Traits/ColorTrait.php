<?php

namespace App\Http\Traits;

trait ColorTrait {
    private function getColors() {
        return $this->colorModel->get();
    }

    private function getColorById($colorId) {
        return $this->colorModel->findOrFail($colorId);
    }
}