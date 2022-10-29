<?php

namespace App\Http\Traits;

trait AdvertisementTrait {
    private function getAdvertisements() {
        return $this->advertisementModel->get();
    }

    private function getAdvertisementsInRandom($limit) {
        return $this->advertisementModel->inRandomOrder()->limit($limit)->get();
    }

    private function getAdvertisementById($advertisementId) {
        return $this->advertisementModel->findOrFail($advertisementId);
    }
}