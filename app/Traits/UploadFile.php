<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    /**
     * Upload a file to a specified path.
     *
     * @param \Illuminate\Http\UploadedFile|null $file
     * @param string $path
     * @return string|null
     */
    public function uploadImage($file, $path)
    {
        if (!$file) {
            return null;
        }

        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->storeAs($path, $fileName, 'public');

        return $fileName;
    }

    /**
     * Delete a file from storage.
     *
     * @param string $filePath
     * @return bool
     */
    public function deleteImage($filePath)
    {
        return Storage::disk('public')->delete($filePath);
    }
}
