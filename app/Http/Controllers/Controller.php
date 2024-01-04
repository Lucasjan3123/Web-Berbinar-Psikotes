<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /** 
     * Return the response success when client request the data to server. 
     */

    protected function sendResponse($result, $message)
    {
        $response = [
            'status' => Response::HTTP_OK,
            'message' => $message,
            'data' => $result,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    protected function sendResponseWithToken($token, $message)
    {
        $response = [
            'status' => Response::HTTP_OK,
            'message' => $message,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    protected function sendError($error, $errorMessages = [], $status = Response::HTTP_BAD_REQUEST)
    {
        $response = [
            'status' => $status,
            'message' => $error,
        ];

        if (!empty($errorMessages))
        {
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $status);
    }
}
