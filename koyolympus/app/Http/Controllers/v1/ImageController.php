<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Models\Photo;
use App\Http\Services\PhotoService;
use Exception;
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
        $this->middleware('auth')->except(['getPhoto', 'downloadPhoto']);
        $this->photoService = $photoService;
    }

    public function index()
    {
        return csrf_token();
    }

    public function getPhoto()
    {
        return $this->photoService->getAllPhoto();
    }

    public function downloadPhoto(Photo $photo)
    {
        if (!Storage::disk('s3')->exists($photo->file_path)) {
            abort(404);
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
            $uniqueFileName = $this->photoService->uploadPhotoToS3($file, $fileName, $genre);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $this->removePhoto($request);
            Log::error($e->getMessage());
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
