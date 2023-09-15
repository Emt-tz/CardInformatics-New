<?php

namespace App\Helpers;

class ApiResponse
{
    /**
     * Send a success response.
     *
     * @param  string  $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendSuccessResponse($message = 'Success', $code = 200)
    {
        return response()->json(['success_notification' => $message], $code)->original;
    }

    /**
     * Send a failure response.
     *
     * @param  string  $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendFailureResponse($message, $code = 400)
    {
        return response()->json(['fail_notification' => $message], $code)->original;
    }
}
