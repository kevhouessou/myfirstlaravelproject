<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class ErrorService
{

    public static function handleError(\Throwable $error) {
        Log::debug($error->getMessage(),$error->getTrace());

        if($error instanceof MethodNotAllowedHttpException){
            return response()->json("Methode non allouée", Response::HTTP_METHOD_NOT_ALLOWED);
        }

        if($error instanceof ModelNotFoundException) {
            return response()->json('donnée non trouvée', Response::HTTP_NOT_FOUND);
        }

        if($error instanceof  ValidationException) {
            return  \response()->json($error->errors(),Response::HTTP_UNPROCESSABLE_ENTITY);
        }

       return response()->json("Une erreur est survenue", Response::HTTP_INTERNAL_SERVER_ERROR);

    }
}
