<?php

namespace App\Http\Services;

use App\Http\Models\Photo;
use Illuminate\Http\UploadedFile;
use Storage;


class PhotoService
{

    private $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function getAllPhoto()
    {
        return $this->photo->getAllPhoto();
    }

    public function uploadPhotoToS3(UploadedFile $file, string $fileName, int $genre): string
    {
        $filePath = config("const.PHOTO.GENRE_FILE_URL.$genre");
        $uniqueFileName = $this->photo->createPhotoInfo($fileName, $filePath, $genre);
        Storage::disk('s3')->putFileAs($filePath, $file, $uniqueFileName, 'public');

        return $uniqueFileName;
    }

    public function deletePhotoFromS3(string $fileName, int $genre)
    {
        $filePath = config("const.PHOTO.GENRE_FILE_URL.$genre");
        $this->photo->deletePhotoInfo($fileName, $filePath, $genre);
        Storage::disk('s3')->delete($filePath . '/' . $fileName);
    }
}
