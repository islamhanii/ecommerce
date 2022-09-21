<?php

namespace App\Http\Traits;

trait SizeUnitsTrait {
    private function getSizeUnits() {
        return $this->sizeUnitsModel->get();
    }

    private function getSizeUnitById($sizeUnitId) {
        return $this->sizeUnitsModel->findOrFail($sizeUnitId);
    }
}