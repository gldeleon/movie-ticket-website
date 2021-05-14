<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse {

    public function successResponse($data, int $code = Response::HTTP_OK) {
        return response()->json(['data' => $data, 'message' => 'Success'], $code);
    }

    public function errorResponse($message, int $code) {
        return response()->json(['error' => $message]);
    }

}
