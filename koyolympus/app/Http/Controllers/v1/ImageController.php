<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

class ImageController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return csrf_token();
    }

    public function uploadPhoto()
    {

    }

}
