<?php

namespace App\Services;

use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Test;

class TestService
{
    public static function getAllTest(){
        return Test::all();
    }

    public static function saveTest(StoreTestRequest | UpdateTestRequest $request){

    }

    public static function showTest()
    {

    }

    public static function  deleteTest($testUuid)
    {

    }
}
