<?php

namespace Okriiza\ApiResponseFormatter;

use Symfony\Component\HttpFoundation\Response;
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
            'success' => true,
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
        $response['meta']['success'] = $status;
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

    public static function success(
        $data = null,
        $message = null ?? 'OK',
        $status = true,
        $httpCode = Response::HTTP_OK
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
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

    public static function created(
        $data = null,
        $message = null ?? 'Created',
        $status = true,
        $httpCode = Response::HTTP_CREATED
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
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

    public static function noContent(
        $data = null,
        $message = null ?? 'No Content',
        $status = true,
        $httpCode = Response::HTTP_NO_CONTENT
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }

    /**
     * Format Error Response
     *
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function error(
        $data = null,
        $message = null ?? 'Bad Request',
        $status = false,
        $httpCode = Response::HTTP_BAD_REQUEST
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }

    /**
     * Format Error Response
     *
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function unAuthenticated(
        $data = null,
        $message = null ?? 'Unauthenticated',
        $status = false,
        $httpCode = Response::HTTP_UNAUTHORIZED
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }

    /**
     * Format Error Response
     *
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function forbidden(
        $data = null,
        $message = null ?? 'Forbidden',
        $status = false,
        $httpCode = Response::HTTP_FORBIDDEN
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }

    /**
     * Format Error Response
     *
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function notFound(
        $data = null,
        $message = null ?? 'Not Found',
        $status = false,
        $httpCode = Response::HTTP_NOT_FOUND
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }

    /**
     * Format Error Response
     *
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function methodNotAllowed(
        $data = null,
        $message = null ?? 'Method Not Allowed',
        $status = false,
        $httpCode = Response::HTTP_METHOD_NOT_ALLOWED
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }

    /**
     * Format Error Response
     *
     * @param  string|null  $message    Response message
     * @param  bool         $status     Response status
     * @param  int          $httpCode   HTTP response code
     *
     * @return JsonResponse
     */

    public static function failedValidation(
        $data = null,
        $message = null ?? 'Unprocessable Entity',
        $status = false,
        $httpCode = Response::HTTP_UNPROCESSABLE_ENTITY
    ): JsonResponse {
        return response()->json(
            self::prepareResponse($data, $message, $status, $httpCode),
            $httpCode
        );
    }
}
