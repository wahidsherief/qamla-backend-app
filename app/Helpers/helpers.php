<?php

use Illuminate\Http\Response;

if (!function_exists('apiResponse')) {
    /**
     * Standard API response helper function.
     *
     * @param bool $success Indicates if the operation was successful.
     * @param string $message Descriptive message about the response.
     * @param mixed $data Data to be returned with the response.
     * @param int $statusCode HTTP status code of the response.
     * @return \Illuminate\Http\JsonResponse
     */
    function apiResponse($success, $message, $data = [], $statusCode = Response::HTTP_OK)
    {
        $message = ucfirst(str_replace('_', ' ', $message));

        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data
        ];

        // Automatically determine the status code if not provided
        if ($success && $statusCode === Response::HTTP_OK) {
            $statusCode = Response::HTTP_OK;
        } elseif (!$success && $statusCode === Response::HTTP_OK) {
            // Default error code if it's an error and no specific error code provided
            $statusCode = Response::HTTP_BAD_REQUEST;
        }

        return response()->json($response, $statusCode);
    }
}

if (!function_exists('successResponse')) {
    /**
     * Helper function to create a successful JSON response.
     *
     * @param string $message Success message.
     * @param mixed $data Data to be returned with the response.
     * @param int $statusCode HTTP status code, default is 200 OK.
     * @return \Illuminate\Http\JsonResponse
     */
    function successResponse($message, $data = [], $statusCode = Response::HTTP_OK)
    {
        return apiResponse(true, $message, $data, $statusCode);
    }
}

if (!function_exists('errorResponse')) {
    /**
     * Helper function to create an error JSON response.
     *
     * @param string $message Error message.
     * @param mixed $data Data to be returned with the response, usually error details.
     * @param int $statusCode HTTP status code, default is 400 Bad Request.
     * @return \Illuminate\Http\JsonResponse
     */
    function errorResponse($message, $data = [], $statusCode = Response::HTTP_BAD_REQUEST)
    {
        return apiResponse(false, $message, $data, $statusCode);
    }
}
