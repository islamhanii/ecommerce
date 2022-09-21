<?php

namespace App\Http\Traits;

trait SizeTrait {
    private function getSizes() {
        return $this->sizeModel->get();
    }

    private function getSizeById($sizeId) {
        return $this->sizeModel->findOrFail($sizeId);
    }
}