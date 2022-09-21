<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendMessage($success, $message, $code){
        $response = [
            'success' => $success,
            'message' => $message
        ];
        return response()->json($response, $code);
    }
    public function sendData($data){
        return response()->json($data, 200);
    }
}
