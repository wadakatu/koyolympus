<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;

class ImageController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return csrf_token();
    }

    public function uploadPhoto(Request $request): JsonResponse
    {
        Log::debug($request->input('genre'));
        $file = $request->file;
        $fileName = $file->getClientOriginalName();
//        $request->file->move(public_path('files'), $fileName);
        Storage::disk('public')->putFileAs('/files', $file, $fileName);

        return response()->json(['file' => $fileName]);
    }

    public function removePhoto(Request $request): JsonResponse
    {
        $fileName = $request->file['upload']['filename'];
        Storage::disk('public')->delete('/files' . '/' . $fileName);

        return response()->json([]);
    }

}
