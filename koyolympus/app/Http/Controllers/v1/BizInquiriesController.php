<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BizInquiriesRequest;
use App\Mail\BizInquiriesMail;
use Illuminate\Support\Facades\Mail;

class BizInquiriesController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @param BizInquiriesRequest $request
     */
    public function sendBizInquiries(BizInquiriesRequest $request)
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'opinion' => $request->input('opinion'),
        ];

        Mail::to('wadakatukoyo330@gmail.com')->send(new BizInquiriesMail($params));
    }
}
