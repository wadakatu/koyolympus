<?php

namespace App\Http\Services;

use App\Http\Models\Photo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Storage;


class PhotoService
{

    private $photo;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    /**
     * DBから写真のパスを全て取得
     * @param int|null $genre
     * @return LengthAwarePaginator
     */
    public function getAllPhoto(?int $genre): LengthAwarePaginator
    {
        return $this->photo->getAllPhoto($genre);
    }

    public function getAllPhotoRandomly(): Collection
    {
        return $this->photo->getAllPhotoRandomly();
    }

    public function uploadPhotoToS3(UploadedFile $file, string $fileName, int $genre): string
    {
        //保存するS3のファイルパスを取得
        $filePath = config("const.PHOTO.GENRE_FILE_URL.$genre");
        //DBに新規の写真レコード追加
        $uniqueFileName = $this->photo->createPhotoInfo($fileName, $filePath, $genre);
        //S3にファイルを追加
        Storage::disk('s3')->putFileAs($filePath, $file, $uniqueFileName, 'public');

        return $uniqueFileName;
    }

    public function deletePhotoFromS3(string $fileName, int $genre): void
    {
        //ジャンルからファイルパスを取得
        $filePath = config("const.PHOTO.GENRE_FILE_URL.$genre");
        //DBから写真のレコードを削除
        $this->photo->deletePhotoInfo($fileName);
        //S3から写真データを削除
        Storage::disk('s3')->delete($filePath . '/' . $fileName);
    }

    public function deleteMultiplePhotosIfDuplicate(): Collection
    {
        //重複しているファイル一覧を取得
        $duplicatePhotoList = $this->searchMultipleDuplicatePhotos();

        //それぞれのファイルをデータベース・S3から削除
        foreach ($duplicatePhotoList as $duplicateFile) {
            $this->deletePhotoFromS3($duplicateFile->file_name, $duplicateFile->genre);
            $this->photo->deletePhotoInfo($duplicateFile->file_name);
        }

        return $duplicatePhotoList;
    }

    public function searchMultipleDuplicatePhotos(): Collection
    {
        //写真一覧レコードを取得
        $photoList = $this->photo->getAllPhotos();

        $photoNameList = [];

        //写真レコードから必要なデータを配列として抽出
        foreach ($photoList as $key => $photoInfo) {
            $fileName = explode('.', $photoInfo->file_name)[1];
            $photoNameList[$fileName][] = [
                'index' => $key,
                'id' => $photoInfo->id,
                'created_at' => $photoInfo->created_at
            ];
        }

        //重複しているレコードを残し、重複がないレコードはコレクションから削除
        foreach ($photoNameList as $fileName => $photoInfoArray) {
            if (count($photoInfoArray) === 1) {
                unset($photoList[$photoInfoArray[0]['index']]);
            } else {
                array_multisort(array_map("strtotime", array_column($photoInfoArray, "created_at")),
                    SORT_DESC, $photoInfoArray);
                $deletePhotoInfo = array_values($photoInfoArray)[0];
                unset($photoList[$deletePhotoInfo['index']]);
            }
        }

        //コレクションが空の場合は、エラーを投げる
        if ($photoList->isEmpty()) {
            throw new \Error('There is no duplicate file in the database.');
        }

        return $photoList->values();
    }

    public function deletePhotoIfDuplicate(string $fileName): array
    {
        //入力されたファイル名と一致する重複レコードを取得
        $duplicatePhotoFiles = $this->searchDuplicatePhoto($this->photo->getAllPhotos(), $fileName);
        $fileName = null;

        //重複レコードをDBとS3から削除
        foreach ($duplicatePhotoFiles as $duplicateFile) {
            $this->deletePhotoFromS3($duplicateFile->file_name, $duplicateFile->genre);
            $this->photo->deletePhotoInfo($duplicateFile->file_name);
            $fileName = $duplicateFile->file_name;
        }

        return ['deleteFile' => $fileName, 'count' => $duplicatePhotoFiles->count()];
    }

    public function searchDuplicatePhoto(Collection $fileList, string $fileName): Collection
    {
        //取得した写真レコードから、入力されたファイル名と一致するレコードのみ残す
        foreach ($fileList as $index => $fileInfo) {
            $searchFileName = $fileInfo->id . '.' . $fileName;
            if ($searchFileName !== $fileInfo->file_name) {
                unset($fileList[$index]);
                $fileList->values();
            }
        }

        //検索の結果レコードが見つからない
        //またはレコードの検索結果１件のみの場合は重複なしでエラーを投げる。
        if ($fileList->isEmpty() || $fileList->count() === 1) {
            throw new \Error('There is no duplicate file in the database.');
        }

        //一番直近でアップロードされた写真は削除対象にしないので削除
        $indexFileList = $fileList->values();
        unset($indexFileList[0]);

        return $indexFileList;
    }

}
