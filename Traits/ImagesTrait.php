<?php

namespace Dwsproduct\ImageUpload\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImagesTrait
{
    public function uploadMedia($media, $deleteOlder = true, $filenameold, $name, $filepath)
    {
        if ($deleteOlder == true) {
            $this->deleteImage($filepath, $filenameold);
        }
        if ($media->isValid()) {
            $fileName = time() . '-' . $name;
            $media->storeAs($filepath, $fileName, 'public');
            return $fileName;
        }
        return null;
    }

    public function uploadImages($images, $deleteOlder = true, $filenameold, $name, $filepath)
    {   
       
        $image_Arr = [];

        if ($deleteOlder == true) {
            $this->deleteImage($filepath, $filenameold);
        }

        foreach ($images as $image) {
            $file = $image;
            $productOriginalName = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . $name . '_' . uniqid() . '.' . $extension;

            $file->storeAs($filepath, $fileName);
            $image_Arr[] = $fileName; 
        }

        return $image_Arr;
    }

    public function deleteImage($filepath, $image)
    {
        if (Storage::disk('public')->exists($filepath . $image)) {
            Storage::disk('public')->delete($filepath . $image);
        }
        return null;
    }

    public function deleteMultipleImages($images, $path)
    {
        foreach ($images as $image) {
            if (Storage::disk('public')->exists($path . $image)) {
                Storage::disk('public')->delete($path . $image);
            }
        }
    }
}
