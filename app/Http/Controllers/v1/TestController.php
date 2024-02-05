<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Services\ErrorService;
use App\Services\TestService;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    public function index(){
        try {
            return response()->json(
                TestService::getAllTest(),
                Response::HTTP_OK);
        } catch (\Throwable $error) {
            return ErrorService::handleError($error);
        }
    }


    public function store(StoreTestRequest $request){
        try {
            return response()->json(
                TestService::saveTest($request),
                Response::HTTP_CREATED);
        } catch (\Throwable $error) {
            return ErrorService::handleError($error);
        }
    }

    public function show($testUuid){
        try {
            return response()->json(
                TestService::showTest($testUuid),
                Response::HTTP_OK);
        } catch (\Throwable $error) {
            return ErrorService::handleError($error);
        }
    }

    public function update(UpdateTestRequest $request){
        try {
            return response()->json(
                TestService::saveTest($request),
                Response::HTTP_OK);
        } catch (\Throwable $error) {
            return ErrorService::handleError($error);
        }
    }

    public function destroy($testUuid){
        try {
            return response()->json(
                TestService::deleteTest($testUuid),
                Response::HTTP_NO_CONTENT);
        } catch (\Throwable $error) {
            return ErrorService::handleError($error);
        }
    }
}
