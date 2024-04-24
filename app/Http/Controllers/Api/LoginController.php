<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        /**
         * set validation rule for user request
         */
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        /**
         * if validation fails
         */
        if ($validator->fails()) {
            /**
             * meaning http response status code:
             *
             * 422 Unprocessable Content
             *
             * Web Distributed Authoring and Versioning (WebDAV) is an HTTP Extension that lets web developers update their content remotely from a client.
             *
             *
             * The request was well-formed but was unable to be followed due
             * to semantic errors.
             */
            return response()->json($validator->errors(), 422);
        }

        /**
         * get credentials from request
         */
        $credentials = $request->only('username', 'password');

        /**
         * if auth failed
         */
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda Salah'
            ], 401);
        }

        /**
         * if auth success
         */
        return response()->json([
            'success' => true,
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }
}
