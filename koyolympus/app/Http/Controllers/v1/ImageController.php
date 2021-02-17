<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Models\Photo;
use App\Http\Requests\GetPhotoRequest;
use App\Http\Services\PhotoService;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    private $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function index()
    {
        return csrf_token();
    }

    public function getPhoto(GetPhotoRequest $request): LengthAwarePaginator
    {
        $genre = $request->input('genre');
        return $this->photoService->getAllPhoto($genre);
    }


    public function downloadPhoto(Photo $photo)
    {
        if (!Storage::disk('s3')->exists($photo->file_path)) {
            Log::debug('画像が見つかりませんでした。');
            return response(['error' => 'no image found'], 404);
        }

        return response(Storage::disk('s3')->get($photo->file_path), 200);
    }

    public function uploadPhoto(Request $request): JsonResponse
    {
        $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $genre = $request->input('genre');

        $uniqueFileName = null;
        DB::beginTransaction();

        try {
            Log::debug('ファイルのアップロード開始');
            $uniqueFileName = $this->photoService->uploadPhotoToS3($file, $fileName, $genre);
            DB::commit();
            Log::debug('ファイルのアップロード終了');
        } catch (Exception $e) {
            Log::debug('ファイルのアップロードに失敗しました。');
            DB::rollBack();
            $this->removePhoto($request);
            Log::error($e->getMessage());
            return response()->json([], 500);
        }

        return response()->json(['file' => $uniqueFileName]);
    }

    public function removePhoto(Request $request): JsonResponse
    {
        $file = $request->file;
        $fileName = $file['custom'];
        $genre = $request->input('genre');
        $this->photoService->deletePhotoFromS3($fileName, $genre);

        return response()->json([]);
    }

}
