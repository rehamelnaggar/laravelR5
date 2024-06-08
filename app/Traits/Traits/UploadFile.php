<?php

namespace App\Traits\traits;

trait UploadFile
{
    public function uploadImage($imageFile, $path)
    {
        $imgExt = $imageFile->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $imageFile->move($path, $fileName);
        return $fileName;
    }
}