<?php

namespace App\Http\Traits;

trait LanguageTrait {
    private function getLanguages()
    {
        return $this->languageModel::get();
    }

    private function getLanguageById($languageId)
    {
        return $this->languageModel::findOrFail($languageId);
    }
}