<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public static function successResponse($data = [])
    {
        return response()->json([
            'message'   => "Success",
            'data'      => $data
        ], 200);
    }

    public static function errorResponse($data = [])
    {
        return response()->json([
            'message'   => "Error",
            'data'      => $data
        ], 204);
    }
}
