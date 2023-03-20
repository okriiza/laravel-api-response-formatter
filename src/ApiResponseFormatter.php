<?php

namespace Okriiza\ApiResponseFormatter;

use Illuminate\Http\JsonResponse;

class ApiResponseFormatter
{

    /**
     * Response array
     *
     * @var array
     */

    private static $response = [
        'meta' => [
            'code' => 200,
            'status' => true,
            'message' => null,
        ],
        'result' => null,
    ];

    /**
     * Prepare Response
     *
     * @param  mixed|null   $data       Response data
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $code       Response code
     *
     * @return array
     */

    private static function prepareResponse($data, $message, $status, $code): array
    {
        $response = self::$response;
        $response['meta']['message'] = $message;
        $response['meta']['status'] = $status;
        $response['meta']['code'] = $code;
        $response['result'] = $data;

        return $response;
    }

    /**
     * Format Success Response
     *
     * @param  mixed|null   $data       Response data
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function success($data = null, $message = null, $status = true, $httpCode = 200): JsonResponse
    {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }

    /**
     * Format Error Response
     *
     * @param  string|null  $message    Response message
     * @param  int          $code       Response code
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function error($message = null, $code = 400, $status = false, $httpCode = 400): JsonResponse
    {
        return response()->json(
            self::prepareResponse(null, $message, $status, $code),
            $httpCode
        );
    }
}
