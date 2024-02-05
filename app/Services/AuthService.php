<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException
     * Authenticate  user who connect to platform
     */
    public static function authenticatedUser(LoginRequest $request) {
        if(!(Auth::attempt($request->validated()))){
               self::CustomAuthenticationException(Response::HTTP_UNAUTHORIZED,"Identifiants invalides");
        } else {

            $user = Auth::user();

            if($user->isDisabled()){
                self::CustomAuthenticationException(Response::HTTP_FORBIDDEN,"Utilisateur désactivé");
            }

            $token = $user->createToken($user->name)->plainTextToken;


            return response()->json([
                "user" => $user,
                "token" => $token
            ], Response::HTTP_OK);
        }
    }

    public static function customAuthenticationException($code, $message): void
    {
        abort($code, $message);
    }


    public static function logout(LogoutRequest $request){

        $user = User::query()->where('uuid','=',$request->uuid)->first();

        Log::debug($request);

        $user->tokens()->delete();

        return response()->json([""],Response::HTTP_NO_CONTENT);

    }


    public static function getCurrentUser(){
         $user = Auth::user();
         return \response()->json($user,Response::HTTP_OK);
    }

}

