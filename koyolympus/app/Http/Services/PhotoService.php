<?php

namespace App\Http\Services;

use App\Http\Models\Photo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Log;
use Storage;


class PhotoService
{

    private $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function getAllPhoto(?int $genre): LengthAwarePaginator
    {
        Log::debug($genre);
        return $this->photo->getAllPhoto($genre);
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
        $this->photo->deletePhotoInfo($fileName);
        Storage::disk('s3')->delete($filePath . '/' . $fileName);
    }
}
