<?php

namespace App\Http\Traits;

trait SliderTrait {
    private function getSliders() {
        return $this->sliderModel->get();
    }

    private function getSliderById($sliderId) {
        return $this->sliderModel->findOrFail($sliderId);
    }
}