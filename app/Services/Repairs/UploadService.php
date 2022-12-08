<?php

declare(strict_types=1);

namespace App\Services\Repairs;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService
{
    public function uploadMedia(UploadedFile $uploadedFile): string
    {
        $path = $uploadedFile->storeAs('files/repair/' . date('Y-m-d'), $uploadedFile->hashName(), 'public');
        if ($path === false) {
            throw new UploadException("File was not upload");
        }

        return $path;
    }
}
