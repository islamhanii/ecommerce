<?php

namespace App\Http\Traits;

trait DetailTrait {
    private function getDetails() {
        return $this->detailModel->get();
    }

    private function getDetailById($detailId) {
        return $this->detailModel->findOrFail($detailId);
    }
}