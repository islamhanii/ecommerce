<?php

namespace App\Http\Traits;

trait SizeUnitsTrait {
    public function getSizeUnits() {
        return $this->sizeUnitsModel->get();
    }

    public function getSizeUnitsById($sizeUnitId) {
        return $this->sizeUnitsModel->findOrFail($sizeUnitId);
    }
}