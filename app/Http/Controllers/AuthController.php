<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client();
        try {
            $response = $http->post(
                config("services.passport.login_endpoint"),
                [
                    "form_params" => [
                        "grant_type" => "password",
                        "client_id" => config("services.passport.client_id"),
                        "client_secret" => config(
                            "services.passport.client_secret"
                        ),
                        "username" => $request->username,
                        "password" => $request->password,
                    ],
                ]
            );

            return response()->json([
                "message" => "SUCCESS",
                "data" => json_decode($response->getBody()),
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json([
                    "message" => "ERROR_ENTER_USERNAME_&_PASSWORD",
                    "error_code" => $e->getCode(),
                ]);
            } elseif ($e->getCode() === 401) {
                return response()->json([
                    "message" => "ERROR_ENTER_A_VALID_USERNAME_&_PASSWORD",
                    "error_code" => $e->getCode(),
                ]);
            }

            return response()->json([
                "message" => "SERVER_ERROR",
                "error_code" => $e->getCode(),
            ]);
        }
    }

    public function logout()
    {
        auth()
            ->user()
            ->tokens->each(function ($token, $key) {
                $token->delete();
            });

        return response()->json(["message" => "USER_LOGGED_OUT"]);
    }

    public function register(Request $request): JsonResponse
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if ($request->is_admin) {
            $user->assignRole("admin");
        }

        return response()->json(["message" => "USER_CREATED", "data" => $user]);
    }
}
