<?php

namespace App\Http\Traits;

trait AboutTrait {
    private function getAbouts() {
        return $this->aboutModel->get();
    }

    private function getAboutById($aboutId) {
        return $this->aboutModel->findOrFail($aboutId);
    }
}