<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageStorage {
    public function uploadImage($request, $folder, $record = null, $recordImageName = 'image') {
        if(!$record) {
            if(!$request->hasFile('image')) return null;
            return Storage::putFile($folder, $request->file('image'));
        }

        $path = $record->$recordImageName;
        if(!$request->hasFile('image')) return $path;
        
        if($path)   $this->deleteImage($path);
        return Storage::putFile($folder, $request->file('image'));
    }

    public function deleteImage($path) {
        Storage::delete($path);
    }
}