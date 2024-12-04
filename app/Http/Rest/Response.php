<?php

namespace App\Http\Rest;

use Illuminate\Http\JsonResponse;

trait Response
{
    /**
     * success response
     *
     * @param mixed $data
     * @param string|null $message
     * @param int $status
     * @return JsonResponse
     */
    public static function success($data = null, string $message = '', int $status = 200): JsonResponse
    {
        $response = [
            'response' => [
                'errCode' => 0,
                'errMsg'  => $message,
            ],
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }

    /**
     * error response
     *
     * @param string $message
     * @param int $status
     * @param mixed $data
     * @return JsonResponse
     */
    public static function error(string $message, int $code, int $status = 400, $data = null): JsonResponse
    {
        $response = [
            'response' => [
                'errCode' => $code,
                'errMsg'  => $message,
            ],
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }
}