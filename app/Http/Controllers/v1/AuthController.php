<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Services\AuthService;
use App\Services\ErrorService;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
       return AuthService::authenticatedUser($request);

    }

    public function logout(LogoutRequest $request)
    {
        return AuthService::logout($request);
    }

    public function profile()
    {
     return AuthService::getCurrentUser();
    }


}
